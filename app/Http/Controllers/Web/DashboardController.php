<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\FinanceRecord;
use App\Models\IncomeTarget;
use App\Models\LifeSchedule;
use App\Models\WorkPlan;
use App\Models\WorkTarget;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        $schedules = LifeSchedule::where('user_id', $request->user()->id)
            ->orderBy('start_at')
            ->get();
        $calendarMonth = $request->query('month')
            ? Carbon::parse($request->query('month'))->startOfMonth()
            : now()->startOfMonth();

        return $this->render($request, 'dashboard', [
            'recentRecords' => FinanceRecord::where('user_id', $request->user()->id)
                ->latest('occurred_at')
                ->limit(5)
                ->get(),
            'openPlans' => WorkPlan::where('user_id', $request->user()->id)
                ->where('is_done', false)
                ->orderByRaw('due_at IS NULL')
                ->orderBy('due_at')
                ->limit(5)
                ->get(),
            'todaySchedules' => $schedules->filter(fn (LifeSchedule $schedule) => $schedule->occursOn(now()))->values(),
            'calendarMonth' => $calendarMonth,
            'previousMonth' => $calendarMonth->copy()->subMonth()->format('Y-m'),
            'nextMonth' => $calendarMonth->copy()->addMonth()->format('Y-m'),
            'calendarDays' => $this->buildScheduleCalendar($schedules, $calendarMonth),
        ]);
    }

    public function finance(Request $request): View
    {
        $query = FinanceRecord::where('user_id', $request->user()->id)
            ->latest('occurred_at');

        if ($request->query('type')) {
            $query->where('type', $request->query('type'));
        }

        return $this->render($request, 'finance', [
            'records' => $query->get(),
            'financeFilter' => $request->query('type'),
            'financeTotals' => $this->financeTotals($request->user()->id),
        ]);
    }

    public function storeFinance(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'type' => ['required', 'in:income,expense'],
            'amount' => ['required', 'numeric', 'min:0'],
            'category' => ['nullable', 'string', 'max:80'],
            'note' => ['nullable', 'string', 'max:255'],
            'occurred_at' => ['required', 'date'],
        ]);

        $data['user_id'] = $request->user()->id;
        FinanceRecord::create($data);

        return back()->with('status', 'Catatan keuangan tersimpan.');
    }

    public function destroyFinance(Request $request, FinanceRecord $financeRecord): RedirectResponse
    {
        $this->ensureOwner($request, $financeRecord);
        $financeRecord->delete();

        return back()->with('status', 'Catatan keuangan dihapus.');
    }

    public function incomeTargets(Request $request): View
    {
        $targets = IncomeTarget::where('user_id', $request->user()->id)
            ->orderByDesc('period_start')
            ->get()
            ->map(function (IncomeTarget $target) use ($request) {
                [$realized, $progress] = $this->incomeTargetProgress($request->user()->id, $target);
                $target->setAttribute('realized_amount', $realized);
                $target->setAttribute('progress', $progress);
                return $target;
            });

        return $this->render($request, 'income-targets', ['targets' => $targets]);
    }

    public function storeIncomeTarget(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'period' => ['required', 'in:weekly,monthly,yearly'],
            'period_start' => ['required', 'date'],
            'period_end' => ['required', 'date', 'after_or_equal:period_start'],
            'target_amount' => ['required', 'numeric', 'min:0'],
            'note' => ['nullable', 'string', 'max:1000'],
        ]);

        $data['user_id'] = $request->user()->id;
        IncomeTarget::create($data);

        return back()->with('status', 'Target pendapatan tersimpan.');
    }

    public function destroyIncomeTarget(Request $request, IncomeTarget $incomeTarget): RedirectResponse
    {
        $this->ensureOwner($request, $incomeTarget);
        $incomeTarget->delete();

        return back()->with('status', 'Target pendapatan dihapus.');
    }

    public function workTargets(Request $request): View
    {
        $query = WorkTarget::where('user_id', $request->user()->id)
            ->latest('updated_at');

        if ($request->query('status')) {
            $query->where('status', $request->query('status'));
        }

        return $this->render($request, 'work-targets', [
            'workTargets' => $query->get(),
            'workTargetFilter' => $request->query('status'),
        ]);
    }

    public function storeWorkTarget(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5000'],
            'deadline' => ['nullable', 'date'],
            'status' => ['nullable', 'in:pending,on_progress,done'],
            'progress' => ['nullable', 'integer', 'min:0', 'max:100'],
        ]);

        $data['user_id'] = $request->user()->id;
        WorkTarget::create($data);

        return back()->with('status', 'Target pekerjaan tersimpan.');
    }

    public function destroyWorkTarget(Request $request, WorkTarget $workTarget): RedirectResponse
    {
        $this->ensureOwner($request, $workTarget);
        $workTarget->delete();

        return back()->with('status', 'Target pekerjaan dihapus.');
    }

    public function workPlans(Request $request): View
    {
        return $this->render($request, 'work-plans', [
            'workPlans' => WorkPlan::with('workTarget')
                ->where('user_id', $request->user()->id)
                ->orderBy('is_done')
                ->orderByRaw("CASE priority WHEN 'high' THEN 1 WHEN 'medium' THEN 2 ELSE 3 END")
                ->orderByRaw('due_at IS NULL')
                ->orderBy('due_at')
                ->get(),
            'workTargets' => WorkTarget::where('user_id', $request->user()->id)
                ->latest('updated_at')
                ->get(),
        ]);
    }

    public function storeWorkPlan(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'work_target_id' => ['nullable', 'integer', 'exists:work_targets,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5000'],
            'priority' => ['nullable', 'in:low,medium,high'],
            'due_at' => ['nullable', 'date'],
        ]);

        if (! empty($data['work_target_id'])) {
            $target = WorkTarget::where('user_id', $request->user()->id)->findOrFail($data['work_target_id']);
            $data['work_target_id'] = $target->id;
        }

        $data['user_id'] = $request->user()->id;
        $data['is_done'] = false;
        WorkPlan::create($data);

        return back()->with('status', 'Rencana pekerjaan tersimpan.');
    }

    public function toggleWorkPlan(Request $request, WorkPlan $workPlan): RedirectResponse
    {
        $this->ensureOwner($request, $workPlan);
        $workPlan->update(['is_done' => ! $workPlan->is_done]);

        return back()->with('status', $workPlan->is_done ? 'Rencana ditandai selesai.' : 'Rencana dibuka kembali.');
    }

    public function destroyWorkPlan(Request $request, WorkPlan $workPlan): RedirectResponse
    {
        $this->ensureOwner($request, $workPlan);
        $workPlan->delete();

        return back()->with('status', 'Rencana pekerjaan dihapus.');
    }

    public function schedules(Request $request): View
    {
        $schedules = LifeSchedule::where('user_id', $request->user()->id)
            ->orderBy('start_at')
            ->get();
        $calendarMonth = $request->query('month')
            ? Carbon::parse($request->query('month'))->startOfMonth()
            : now()->startOfMonth();

        return $this->render($request, 'life-schedules', [
            'schedules' => $schedules,
            'todaySchedules' => $schedules->filter(fn (LifeSchedule $schedule) => $schedule->occursOn(now()))->values(),
            'calendarMonth' => $calendarMonth,
            'previousMonth' => $calendarMonth->copy()->subMonth()->format('Y-m'),
            'nextMonth' => $calendarMonth->copy()->addMonth()->format('Y-m'),
            'calendarDays' => $this->buildScheduleCalendar($schedules, $calendarMonth),
        ]);
    }

    public function storeSchedule(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5000'],
            'category' => ['nullable', 'string', 'max:80'],
            'start_at' => ['required', 'date'],
            'end_at' => ['required', 'date', 'after_or_equal:start_at'],
            'repeat' => ['nullable', 'in:none,daily,weekly,monthly'],
            'repeat_days' => ['nullable', 'string', 'max:64'],
            'color' => ['nullable', 'string', 'max:16'],
        ]);

        $data['user_id'] = $request->user()->id;
        LifeSchedule::create($data);

        return back()->with('status', 'Jadwal tersimpan.');
    }

    public function destroySchedule(Request $request, LifeSchedule $lifeSchedule): RedirectResponse
    {
        $this->ensureOwner($request, $lifeSchedule);
        $lifeSchedule->delete();

        return back()->with('status', 'Jadwal dihapus.');
    }

    private function render(Request $request, string $page, array $data = []): View
    {
        $user = $request->user();
        $now = now();
        $startOfMonth = $now->copy()->startOfMonth();
        $endOfMonth = $now->copy()->endOfMonth();

        $monthIncome = (float) FinanceRecord::where('user_id', $user->id)
            ->where('type', 'income')
            ->whereBetween('occurred_at', [$startOfMonth, $endOfMonth])
            ->sum('amount');

        $monthExpense = (float) FinanceRecord::where('user_id', $user->id)
            ->where('type', 'expense')
            ->whereBetween('occurred_at', [$startOfMonth, $endOfMonth])
            ->sum('amount');

        $todayIncome = (float) FinanceRecord::where('user_id', $user->id)
            ->where('type', 'income')
            ->whereDate('occurred_at', $now->toDateString())
            ->sum('amount');

        $todayExpense = (float) FinanceRecord::where('user_id', $user->id)
            ->where('type', 'expense')
            ->whereDate('occurred_at', $now->toDateString())
            ->sum('amount');

        $activeTarget = IncomeTarget::where('user_id', $user->id)
            ->whereDate('period_start', '<=', $now)
            ->whereDate('period_end', '>=', $now)
            ->orderByDesc('period_start')
            ->first();

        $targetProgress = 0.0;
        $targetRealized = 0.0;

        if ($activeTarget) {
            $targetRealized = (float) FinanceRecord::where('user_id', $user->id)
                ->where('type', 'income')
                ->whereBetween('occurred_at', [
                    $activeTarget->period_start->copy()->startOfDay(),
                    $activeTarget->period_end->copy()->endOfDay(),
                ])
                ->sum('amount');

            $targetProgress = (float) min(100, $activeTarget->target_amount > 0
                ? ($targetRealized / (float) $activeTarget->target_amount) * 100
                : 0);
        }

        $workTargetsOpen = WorkTarget::where('user_id', $user->id)
            ->whereIn('status', ['pending', 'on_progress'])
            ->count();
        $workTargetsDone = WorkTarget::where('user_id', $user->id)
            ->where('status', 'done')
            ->count();
        $plansToday = WorkPlan::where('user_id', $user->id)
            ->where('is_done', false)
            ->whereDate('due_at', $now->toDateString())
            ->count();
        $plansOverdue = WorkPlan::where('user_id', $user->id)
            ->where('is_done', false)
            ->whereNotNull('due_at')
            ->whereDate('due_at', '<', $now->toDateString())
            ->count();
        $todayScheduleCount = LifeSchedule::where('user_id', $user->id)
            ->get()
            ->filter(fn (LifeSchedule $schedule) => $schedule->occursOn($now))
            ->count();

        return view('dashboard', array_merge([
            'user' => $user,
            'page' => $page,
            'summary' => [
                'month_income' => $monthIncome,
                'month_expense' => $monthExpense,
                'month_balance' => $monthIncome - $monthExpense,
                'today_income' => $todayIncome,
                'today_expense' => $todayExpense,
                'work_targets_open' => $workTargetsOpen,
                'work_targets_done' => $workTargetsDone,
                'plans_today' => $plansToday,
                'plans_overdue' => $plansOverdue,
                'today_schedule_count' => $todayScheduleCount,
            ],
            'activeTarget' => $activeTarget,
            'targetProgress' => $targetProgress,
            'targetRealized' => $targetRealized,
        ], $data));
    }

    private function financeTotals(int $userId): array
    {
        $income = (float) FinanceRecord::where('user_id', $userId)->where('type', 'income')->sum('amount');
        $expense = (float) FinanceRecord::where('user_id', $userId)->where('type', 'expense')->sum('amount');

        return [
            'income' => $income,
            'expense' => $expense,
            'balance' => $income - $expense,
        ];
    }

    private function incomeTargetProgress(int $userId, IncomeTarget $target): array
    {
        $realized = (float) FinanceRecord::where('user_id', $userId)
            ->where('type', 'income')
            ->whereBetween('occurred_at', [
                $target->period_start->copy()->startOfDay(),
                $target->period_end->copy()->endOfDay(),
            ])
            ->sum('amount');

        $progress = (float) min(100, $target->target_amount > 0
            ? ($realized / (float) $target->target_amount) * 100
            : 0);

        return [$realized, $progress];
    }

    private function buildScheduleCalendar($schedules, Carbon $month): array
    {
        $start = $month->copy()->startOfMonth()->startOfWeek(Carbon::MONDAY);
        $end = $month->copy()->endOfMonth()->endOfWeek(Carbon::SUNDAY);
        $days = [];

        for ($date = $start->copy(); $date->lte($end); $date->addDay()) {
            $occurrences = $schedules
                ->filter(fn (LifeSchedule $schedule) => $schedule->occursOn($date))
                ->values();

            $days[] = [
                'date' => $date->copy(),
                'in_month' => $date->isSameMonth($month),
                'is_today' => $date->isToday(),
                'schedules' => $occurrences,
            ];
        }

        return $days;
    }

    private function ensureOwner(Request $request, mixed $model): void
    {
        abort_unless((int) $model->user_id === (int) $request->user()->id, 403, 'Bukan milik Anda.');
    }
}
