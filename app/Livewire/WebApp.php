<?php

namespace App\Livewire;

use App\Models\FinanceRecord;
use App\Models\IncomeTarget;
use App\Models\LifeSchedule;
use App\Models\DataShare;
use App\Models\User;
use App\Models\Vacation;
use App\Models\WorkPlan;
use App\Models\WorkTarget;
use App\Models\WorkTargetChangeRequest;
use App\Support\SharedData;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class WebApp extends Component
{
    public string $page = 'dashboard';
    public ?string $financeFilter = null;
    public ?string $workTargetFilter = null;
    public ?string $month = null;

    public string $financeType = 'income';
    public string $financeAmount = '';
    public string $financeCategory = '';
    public string $financeNote = '';
    public string $financeOccurredAt = '';

    public string $incomeTitle = '';
    public string $incomePeriod = 'monthly';
    public string $incomeTargetAmount = '';
    public string $incomePeriodStart = '';
    public string $incomePeriodEnd = '';
    public string $incomeNote = '';

    public string $workTargetTitle = '';
    public string $workTargetDescription = '';
    public string $workTargetDeadline = '';
    public string $workTargetStatus = 'on_progress';
    public int $workTargetProgress = 0;
    public ?int $editingWorkTargetId = null;
    public bool $editingSharedWorkTarget = false;

    public ?int $workPlanTargetId = null;
    public string $workPlanTitle = '';
    public string $workPlanDescription = '';
    public string $workPlanPriority = 'medium';
    public string $workPlanDueAt = '';

    public string $scheduleTitle = '';
    public string $scheduleDescription = '';
    public string $scheduleCategory = '';
    public string $scheduleStartAt = '';
    public string $scheduleEndAt = '';
    public string $scheduleRepeat = 'none';
    public string $scheduleColor = '#5B5FEF';
    public string $shareEmail = '';

    public string $vacationTitle = '';
    public string $vacationDestination = '';
    public string $vacationDescription = '';
    public string $vacationStartDate = '';
    public string $vacationEndDate = '';
    public string $vacationBudget = '';
    public string $vacationStatus = 'planned';
    public string $vacationAddress = '';
    public string $vacationLatitude = '';
    public string $vacationLongitude = '';
    public string $vacationMapUrl = '';
    public string $vacationNotes = '';

    public function mount(string $page = 'dashboard', ?string $financeFilter = null, ?string $workTargetFilter = null, ?string $month = null): void
    {
        $this->page = $page;
        $this->financeFilter = $financeFilter;
        $this->workTargetFilter = $workTargetFilter;
        $this->month = $month;
        $this->resetFormDates();
    }

    public function setFinanceFilter(?string $type): void
    {
        $this->financeFilter = $type;
    }

    public function setWorkTargetFilter(?string $status): void
    {
        $this->workTargetFilter = $status;
    }

    public function storeFinance(): void
    {
        $data = $this->validate([
            'financeType' => ['required', 'in:income,expense'],
            'financeAmount' => ['required', 'numeric', 'min:0'],
            'financeCategory' => ['nullable', 'string', 'max:80'],
            'financeNote' => ['nullable', 'string', 'max:255'],
            'financeOccurredAt' => ['required', 'date'],
        ]);

        FinanceRecord::create([
            'user_id' => auth()->id(),
            'type' => $data['financeType'],
            'amount' => $data['financeAmount'],
            'category' => $data['financeCategory'],
            'note' => $data['financeNote'],
            'occurred_at' => $data['financeOccurredAt'],
        ]);

        $this->financeAmount = '';
        $this->financeCategory = '';
        $this->financeNote = '';
        session()->flash('status', 'Catatan keuangan tersimpan.');
    }

    public function destroyFinance(int $id): void
    {
        $record = FinanceRecord::where('user_id', auth()->id())->findOrFail($id);
        $record->delete();
        session()->flash('status', 'Catatan keuangan dihapus.');
    }

    public function storeIncomeTarget(): void
    {
        $data = $this->validate([
            'incomeTitle' => ['required', 'string', 'max:255'],
            'incomePeriod' => ['required', 'in:weekly,monthly,yearly'],
            'incomePeriodStart' => ['required', 'date'],
            'incomePeriodEnd' => ['required', 'date', 'after_or_equal:incomePeriodStart'],
            'incomeTargetAmount' => ['required', 'numeric', 'min:0'],
            'incomeNote' => ['nullable', 'string', 'max:1000'],
        ]);

        IncomeTarget::create([
            'user_id' => auth()->id(),
            'title' => $data['incomeTitle'],
            'period' => $data['incomePeriod'],
            'period_start' => $data['incomePeriodStart'],
            'period_end' => $data['incomePeriodEnd'],
            'target_amount' => $data['incomeTargetAmount'],
            'note' => $data['incomeNote'],
        ]);

        $this->incomeTitle = '';
        $this->incomeTargetAmount = '';
        $this->incomeNote = '';
        session()->flash('status', 'Target pendapatan tersimpan.');
    }

    public function destroyIncomeTarget(int $id): void
    {
        IncomeTarget::where('user_id', auth()->id())->findOrFail($id)->delete();
        session()->flash('status', 'Target pendapatan dihapus.');
    }

    public function storeWorkTarget(): void
    {
        $data = $this->validateWorkTarget();

        if ($this->editingWorkTargetId) {
            $target = WorkTarget::whereIn('user_id', $this->visibleUserIds())->findOrFail($this->editingWorkTargetId);

            if ($target->user_id !== auth()->id()) {
                WorkTargetChangeRequest::updateOrCreate(
                    [
                        'work_target_id' => $target->id,
                        'requested_by_id' => auth()->id(),
                        'status' => 'pending',
                    ],
                    [
                        'proposed_changes' => $this->workTargetPayload($data),
                    ],
                );

                $this->resetWorkTargetForm();
                session()->flash('status', 'Perubahan target pekerjaan diajukan dan menunggu persetujuan pemilik.');
                return;
            }

            $target->update($this->workTargetPayload($data));

            $this->resetWorkTargetForm();
            session()->flash('status', 'Target pekerjaan diperbarui.');
            return;
        }

        WorkTarget::create([
            'user_id' => auth()->id(),
            'title' => $data['workTargetTitle'],
            'description' => $data['workTargetDescription'],
            'deadline' => $data['workTargetDeadline'] ?: null,
            'status' => $data['workTargetStatus'],
            'progress' => $data['workTargetProgress'],
        ]);

        $this->resetWorkTargetForm();
        session()->flash('status', 'Target pekerjaan tersimpan.');
    }

    public function editWorkTarget(int $id): void
    {
        $target = WorkTarget::whereIn('user_id', $this->visibleUserIds())->findOrFail($id);

        $this->editingWorkTargetId = $target->id;
        $this->editingSharedWorkTarget = $target->user_id !== auth()->id();
        $this->workTargetTitle = $target->title;
        $this->workTargetDescription = $target->description ?? '';
        $this->workTargetDeadline = $target->deadline?->toDateString() ?? '';
        $this->workTargetStatus = $target->status;
        $this->workTargetProgress = (int) $target->progress;
    }

    public function cancelWorkTargetEdit(): void
    {
        $this->resetWorkTargetForm();
    }

    public function destroyWorkTarget(int $id): void
    {
        WorkTarget::where('user_id', auth()->id())->findOrFail($id)->delete();
        if ($this->editingWorkTargetId === $id) {
            $this->resetWorkTargetForm();
        }
        session()->flash('status', 'Target pekerjaan dihapus.');
    }

    public function approveWorkTargetChangeRequest(int $id): void
    {
        $request = WorkTargetChangeRequest::with('workTarget')
            ->where('status', 'pending')
            ->findOrFail($id);

        abort_unless($request->workTarget->user_id === auth()->id(), 403);

        $request->workTarget->update($request->proposed_changes);
        $request->update([
            'status' => 'approved',
            'reviewed_by_id' => auth()->id(),
            'reviewed_at' => now(),
        ]);

        session()->flash('status', 'Perubahan target pekerjaan disetujui.');
    }

    public function rejectWorkTargetChangeRequest(int $id): void
    {
        $request = WorkTargetChangeRequest::with('workTarget')
            ->where('status', 'pending')
            ->findOrFail($id);

        abort_unless($request->workTarget->user_id === auth()->id(), 403);

        $request->update([
            'status' => 'rejected',
            'reviewed_by_id' => auth()->id(),
            'reviewed_at' => now(),
        ]);

        session()->flash('status', 'Perubahan target pekerjaan ditolak.');
    }

    public function storeWorkPlan(): void
    {
        $data = $this->validate([
            'workPlanTargetId' => ['nullable', 'integer', 'exists:work_targets,id'],
            'workPlanTitle' => ['required', 'string', 'max:255'],
            'workPlanDescription' => ['nullable', 'string', 'max:5000'],
            'workPlanPriority' => ['nullable', 'in:low,medium,high'],
            'workPlanDueAt' => ['nullable', 'date'],
        ]);

        if ($data['workPlanTargetId']) {
            WorkTarget::where('user_id', auth()->id())->findOrFail($data['workPlanTargetId']);
        }

        WorkPlan::create([
            'user_id' => auth()->id(),
            'work_target_id' => $data['workPlanTargetId'],
            'title' => $data['workPlanTitle'],
            'description' => $data['workPlanDescription'],
            'priority' => $data['workPlanPriority'],
            'due_at' => $data['workPlanDueAt'] ?: null,
            'is_done' => false,
        ]);

        $this->workPlanTargetId = null;
        $this->workPlanTitle = '';
        $this->workPlanDescription = '';
        $this->workPlanDueAt = '';
        session()->flash('status', 'Rencana pekerjaan tersimpan.');
    }

    public function toggleWorkPlan(int $id): void
    {
        $plan = WorkPlan::where('user_id', auth()->id())->findOrFail($id);
        $plan->update(['is_done' => ! $plan->is_done]);
        session()->flash('status', $plan->is_done ? 'Rencana ditandai selesai.' : 'Rencana dibuka kembali.');
    }

    public function destroyWorkPlan(int $id): void
    {
        WorkPlan::where('user_id', auth()->id())->findOrFail($id)->delete();
        session()->flash('status', 'Rencana pekerjaan dihapus.');
    }

    public function storeSchedule(): void
    {
        $data = $this->validate([
            'scheduleTitle' => ['required', 'string', 'max:255'],
            'scheduleDescription' => ['nullable', 'string', 'max:5000'],
            'scheduleCategory' => ['nullable', 'string', 'max:80'],
            'scheduleStartAt' => ['required', 'date'],
            'scheduleEndAt' => ['required', 'date', 'after_or_equal:scheduleStartAt'],
            'scheduleRepeat' => ['nullable', 'in:none,daily,weekly,monthly'],
            'scheduleColor' => ['nullable', 'string', 'max:16'],
        ]);

        LifeSchedule::create([
            'user_id' => auth()->id(),
            'title' => $data['scheduleTitle'],
            'description' => $data['scheduleDescription'],
            'category' => $data['scheduleCategory'],
            'start_at' => $data['scheduleStartAt'],
            'end_at' => $data['scheduleEndAt'],
            'repeat' => $data['scheduleRepeat'],
            'color' => $data['scheduleColor'],
        ]);

        $this->scheduleTitle = '';
        $this->scheduleDescription = '';
        $this->scheduleCategory = '';
        $this->dispatch('schedule-updated');
        session()->flash('status', 'Jadwal tersimpan.');
    }

    public function destroySchedule(int $id): void
    {
        LifeSchedule::where('user_id', auth()->id())->findOrFail($id)->delete();
        $this->dispatch('schedule-updated');
        session()->flash('status', 'Jadwal dihapus.');
    }

    public function storeVacation(): void
    {
        $data = $this->validate([
            'vacationTitle' => ['required', 'string', 'max:255'],
            'vacationDestination' => ['required', 'string', 'max:255'],
            'vacationDescription' => ['nullable', 'string', 'max:5000'],
            'vacationStartDate' => ['nullable', 'date'],
            'vacationEndDate' => ['nullable', 'date', 'after_or_equal:vacationStartDate'],
            'vacationBudget' => ['nullable', 'numeric', 'min:0'],
            'vacationStatus' => ['nullable', 'in:planned,booked,ongoing,completed,cancelled'],
            'vacationAddress' => ['nullable', 'string', 'max:255'],
            'vacationLatitude' => ['nullable', 'numeric', 'between:-90,90'],
            'vacationLongitude' => ['nullable', 'numeric', 'between:-180,180'],
            'vacationMapUrl' => ['nullable', 'string', 'max:1000'],
            'vacationNotes' => ['nullable', 'string', 'max:5000'],
        ]);

        Vacation::create([
            'user_id' => auth()->id(),
            'title' => $data['vacationTitle'],
            'destination' => $data['vacationDestination'],
            'description' => $data['vacationDescription'],
            'start_date' => $data['vacationStartDate'] ?: null,
            'end_date' => $data['vacationEndDate'] ?: null,
            'budget' => $data['vacationBudget'] !== '' ? $data['vacationBudget'] : null,
            'status' => $data['vacationStatus'],
            'address' => $data['vacationAddress'],
            'latitude' => $data['vacationLatitude'] !== '' ? $data['vacationLatitude'] : null,
            'longitude' => $data['vacationLongitude'] !== '' ? $data['vacationLongitude'] : null,
            'map_url' => $data['vacationMapUrl'],
            'notes' => $data['vacationNotes'],
        ]);

        $this->vacationTitle = '';
        $this->vacationDestination = '';
        $this->vacationDescription = '';
        $this->vacationBudget = '';
        $this->vacationAddress = '';
        $this->vacationLatitude = '';
        $this->vacationLongitude = '';
        $this->vacationMapUrl = '';
        $this->vacationNotes = '';
        session()->flash('status', 'Rencana liburan tersimpan.');
    }

    public function destroyVacation(int $id): void
    {
        Vacation::where('user_id', auth()->id())->findOrFail($id)->delete();
        session()->flash('status', 'Rencana liburan dihapus.');
    }

    #[On('vacation-map-picked')]
    public function setVacationCoordinates(float $latitude, float $longitude, ?string $address = null): void
    {
        $this->vacationLatitude = number_format($latitude, 7, '.', '');
        $this->vacationLongitude = number_format($longitude, 7, '.', '');

        if ($address) {
            $this->vacationAddress = $address;
        }

        $this->vacationMapUrl = sprintf(
            'https://www.openstreetmap.org/?mlat=%1$.7f&mlon=%2$.7f#map=15/%1$.7f/%2$.7f',
            $latitude,
            $longitude,
        );
    }

    public function storeShare(): void
    {
        $this->shareEmail = strtolower(trim($this->shareEmail));

        $data = $this->validate([
            'shareEmail' => ['required', 'email', 'exists:users,email'],
        ], [
            'shareEmail.required' => 'Email pengguna wajib diisi.',
            'shareEmail.email' => 'Format email pengguna tidak valid.',
            'shareEmail.exists' => 'Email ini belum terdaftar di AlfaApps pada database server ini.',
        ]);

        $target = User::where('email', $data['shareEmail'])->firstOrFail();

        if ($target->id === auth()->id()) {
            $this->addError('shareEmail', 'Tidak bisa berbagi dengan email sendiri.');
            return;
        }

        $ownerId = min(auth()->id(), $target->id);
        $sharedWithId = max(auth()->id(), $target->id);

        DataShare::firstOrCreate([
            'owner_id' => $ownerId,
            'shared_with_id' => $sharedWithId,
        ]);

        $this->shareEmail = '';
        $this->dispatch('schedule-updated');
        session()->flash('status', 'Berbagi data berhasil diaktifkan.');
    }

    public function destroyShare(int $id): void
    {
        $share = DataShare::query()
            ->where('id', $id)
            ->where(function ($query) {
                $query->where('owner_id', auth()->id())
                    ->orWhere('shared_with_id', auth()->id());
            })
            ->firstOrFail();

        $share->delete();
        $this->dispatch('schedule-updated');
        session()->flash('status', 'Berbagi data dihentikan.');
    }

    public function render()
    {
        return view('livewire.web-app', $this->viewData());
    }

    private function viewData(): array
    {
        $user = auth()->user();
        $summary = $this->summary();
        [$activeTarget, $targetRealized, $targetProgress] = $this->activeTargetData();

        return [
            'user' => $user,
            'summary' => $summary,
            'activeTarget' => $activeTarget,
            'targetRealized' => $targetRealized,
            'targetProgress' => $targetProgress,
            'recentRecords' => FinanceRecord::whereIn('user_id', $this->visibleUserIds())->latest('occurred_at')->limit(5)->get(),
            'openPlans' => WorkPlan::whereIn('user_id', $this->visibleUserIds())->where('is_done', false)->orderByRaw('due_at IS NULL')->orderBy('due_at')->limit(5)->get(),
            'records' => $this->financeRecords(),
            'financeTotals' => $this->financeTotals(),
            'targets' => $this->incomeTargets(),
            'workTargets' => $this->workTargets(),
            'workTargetChangeRequests' => $this->workTargetChangeRequests(),
            'myPendingWorkTargetRequests' => $this->myPendingWorkTargetRequests(),
            'allWorkTargets' => WorkTarget::where('user_id', $user->id)->latest('updated_at')->get(),
            'workPlans' => WorkPlan::with('workTarget')->whereIn('user_id', $this->visibleUserIds())->orderBy('is_done')->orderByRaw("CASE priority WHEN 'high' THEN 1 WHEN 'medium' THEN 2 ELSE 3 END")->orderByRaw('due_at IS NULL')->orderBy('due_at')->get(),
            'schedules' => LifeSchedule::whereIn('user_id', $this->visibleUserIds())->orderBy('start_at')->get(),
            'vacations' => $this->vacations(),
            'shares' => $this->shares(),
        ];
    }

    private function summary(): array
    {
        $userIds = $this->visibleUserIds();
        $now = now();
        $startOfMonth = $now->copy()->startOfMonth();
        $endOfMonth = $now->copy()->endOfMonth();

        $monthIncome = (float) FinanceRecord::whereIn('user_id', $userIds)->where('type', 'income')->whereBetween('occurred_at', [$startOfMonth, $endOfMonth])->sum('amount');
        $monthExpense = (float) FinanceRecord::whereIn('user_id', $userIds)->where('type', 'expense')->whereBetween('occurred_at', [$startOfMonth, $endOfMonth])->sum('amount');

        return [
            'month_income' => $monthIncome,
            'month_expense' => $monthExpense,
            'month_balance' => $monthIncome - $monthExpense,
            'today_income' => (float) FinanceRecord::whereIn('user_id', $userIds)->where('type', 'income')->whereDate('occurred_at', $now->toDateString())->sum('amount'),
            'today_expense' => (float) FinanceRecord::whereIn('user_id', $userIds)->where('type', 'expense')->whereDate('occurred_at', $now->toDateString())->sum('amount'),
            'plans_today' => WorkPlan::whereIn('user_id', $userIds)->where('is_done', false)->whereDate('due_at', $now->toDateString())->count(),
            'plans_overdue' => WorkPlan::whereIn('user_id', $userIds)->where('is_done', false)->whereNotNull('due_at')->whereDate('due_at', '<', $now->toDateString())->count(),
            'today_schedule_count' => LifeSchedule::whereIn('user_id', $userIds)->get()->filter(fn (LifeSchedule $schedule) => $schedule->occursOn($now))->count(),
            'upcoming_vacations' => Vacation::whereIn('user_id', $userIds)->whereIn('status', ['planned', 'booked', 'ongoing'])->count(),
        ];
    }

    private function activeTargetData(): array
    {
        $target = IncomeTarget::whereIn('user_id', $this->visibleUserIds())
            ->whereDate('period_start', '<=', now())
            ->whereDate('period_end', '>=', now())
            ->orderByDesc('period_start')
            ->first();

        if (! $target) {
            return [null, 0.0, 0.0];
        }

        [$realized, $progress] = $this->incomeTargetProgress($target);

        return [$target, $realized, $progress];
    }

    private function financeRecords(): Collection
    {
        $query = FinanceRecord::whereIn('user_id', $this->visibleUserIds())->latest('occurred_at');

        if ($this->financeFilter) {
            $query->where('type', $this->financeFilter);
        }

        return $query->get();
    }

    private function financeTotals(): array
    {
        $income = (float) FinanceRecord::whereIn('user_id', $this->visibleUserIds())->where('type', 'income')->sum('amount');
        $expense = (float) FinanceRecord::whereIn('user_id', $this->visibleUserIds())->where('type', 'expense')->sum('amount');

        return ['income' => $income, 'expense' => $expense, 'balance' => $income - $expense];
    }

    private function incomeTargets(): Collection
    {
        return IncomeTarget::whereIn('user_id', $this->visibleUserIds())
            ->orderByDesc('period_start')
            ->get()
            ->map(function (IncomeTarget $target) {
                [$realized, $progress] = $this->incomeTargetProgress($target);
                $target->setAttribute('realized_amount', $realized);
                $target->setAttribute('progress', $progress);
                return $target;
            });
    }

    private function incomeTargetProgress(IncomeTarget $target): array
    {
        $realized = (float) FinanceRecord::whereIn('user_id', $this->visibleUserIds())
            ->where('type', 'income')
            ->whereBetween('occurred_at', [$target->period_start->copy()->startOfDay(), $target->period_end->copy()->endOfDay()])
            ->sum('amount');

        $progress = (float) min(100, $target->target_amount > 0 ? ($realized / (float) $target->target_amount) * 100 : 0);

        return [$realized, $progress];
    }

    private function workTargets(): Collection
    {
        $query = WorkTarget::whereIn('user_id', $this->visibleUserIds())->latest('updated_at');

        if ($this->workTargetFilter) {
            $query->where('status', $this->workTargetFilter);
        }

        return $query->get();
    }

    private function validateWorkTarget(): array
    {
        return $this->validate([
            'workTargetTitle' => ['required', 'string', 'max:255'],
            'workTargetDescription' => ['nullable', 'string', 'max:5000'],
            'workTargetDeadline' => ['nullable', 'date'],
            'workTargetStatus' => ['nullable', 'in:pending,on_progress,done'],
            'workTargetProgress' => ['nullable', 'integer', 'min:0', 'max:100'],
        ]);
    }

    private function workTargetPayload(array $data): array
    {
        return [
            'title' => $data['workTargetTitle'],
            'description' => $data['workTargetDescription'],
            'deadline' => $data['workTargetDeadline'] ?: null,
            'status' => $data['workTargetStatus'],
            'progress' => $data['workTargetProgress'],
        ];
    }

    private function resetWorkTargetForm(): void
    {
        $this->editingWorkTargetId = null;
        $this->editingSharedWorkTarget = false;
        $this->workTargetTitle = '';
        $this->workTargetDescription = '';
        $this->workTargetDeadline = '';
        $this->workTargetStatus = 'on_progress';
        $this->workTargetProgress = 0;
    }

    private function vacations(): Collection
    {
        return Vacation::whereIn('user_id', $this->visibleUserIds())
            ->orderByRaw("CASE status WHEN 'ongoing' THEN 1 WHEN 'booked' THEN 2 WHEN 'planned' THEN 3 WHEN 'completed' THEN 4 ELSE 5 END")
            ->orderByRaw('start_date IS NULL')
            ->orderBy('start_date')
            ->get();
    }

    private function workTargetChangeRequests(): Collection
    {
        return WorkTargetChangeRequest::with(['workTarget', 'requestedBy'])
            ->where('status', 'pending')
            ->whereHas('workTarget', fn ($query) => $query->where('user_id', auth()->id()))
            ->latest()
            ->get();
    }

    private function myPendingWorkTargetRequests(): Collection
    {
        return WorkTargetChangeRequest::with('workTarget')
            ->where('status', 'pending')
            ->where('requested_by_id', auth()->id())
            ->latest()
            ->get();
    }

    private function resetFormDates(): void
    {
        $this->financeOccurredAt = now()->format('Y-m-d\TH:i');
        $this->incomePeriodStart = now()->startOfMonth()->toDateString();
        $this->incomePeriodEnd = now()->endOfMonth()->toDateString();
        $this->scheduleStartAt = now()->format('Y-m-d\TH:i');
        $this->scheduleEndAt = now()->addHour()->format('Y-m-d\TH:i');
        $this->vacationStartDate = now()->toDateString();
        $this->vacationEndDate = now()->addDay()->toDateString();
    }

    /** @return array<int> */
    private function visibleUserIds(): array
    {
        return SharedData::userIds(auth()->user());
    }

    private function shares(): Collection
    {
        return DataShare::with(['owner', 'sharedWith'])
            ->where('owner_id', auth()->id())
            ->orWhere('shared_with_id', auth()->id())
            ->latest()
            ->get();
    }
}
