<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FinanceRecord;
use App\Models\IncomeTarget;
use App\Models\WorkPlan;
use App\Models\WorkTarget;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function summary(Request $request): JsonResponse
    {
        $userId = $request->user()->id;
        $now = now();
        $startOfMonth = $now->copy()->startOfMonth();
        $endOfMonth = $now->copy()->endOfMonth();

        $monthIncome = (float) FinanceRecord::where('user_id', $userId)
            ->where('type', 'income')
            ->whereBetween('occurred_at', [$startOfMonth, $endOfMonth])
            ->sum('amount');

        $monthExpense = (float) FinanceRecord::where('user_id', $userId)
            ->where('type', 'expense')
            ->whereBetween('occurred_at', [$startOfMonth, $endOfMonth])
            ->sum('amount');

        $todayIncome = (float) FinanceRecord::where('user_id', $userId)
            ->where('type', 'income')
            ->whereDate('occurred_at', $now->toDateString())
            ->sum('amount');

        $todayExpense = (float) FinanceRecord::where('user_id', $userId)
            ->where('type', 'expense')
            ->whereDate('occurred_at', $now->toDateString())
            ->sum('amount');

        $activeTarget = IncomeTarget::where('user_id', $userId)
            ->whereDate('period_start', '<=', $now)
            ->whereDate('period_end', '>=', $now)
            ->orderByDesc('period_start')
            ->first();

        $activeTargetData = null;
        if ($activeTarget) {
            $realized = (float) FinanceRecord::where('user_id', $userId)
                ->where('type', 'income')
                ->whereBetween('occurred_at', [
                    $activeTarget->period_start->startOfDay(),
                    $activeTarget->period_end->endOfDay(),
                ])->sum('amount');

            $activeTargetData = [
                'id' => $activeTarget->id,
                'title' => $activeTarget->title,
                'period' => $activeTarget->period,
                'target_amount' => (float) $activeTarget->target_amount,
                'realized_amount' => $realized,
                'progress' => $activeTarget->target_amount > 0
                    ? round(min(100, ($realized / (float) $activeTarget->target_amount) * 100), 2)
                    : 0,
                'period_start' => $activeTarget->period_start->toDateString(),
                'period_end' => $activeTarget->period_end->toDateString(),
            ];
        }

        return response()->json([
            'success' => true,
            'message' => 'OK',
            'data' => [
                'month' => [
                    'income' => $monthIncome,
                    'expense' => $monthExpense,
                    'balance' => $monthIncome - $monthExpense,
                ],
                'today' => [
                    'income' => $todayIncome,
                    'expense' => $todayExpense,
                ],
                'active_income_target' => $activeTargetData,
                'work' => [
                    'targets_open' => WorkTarget::where('user_id', $userId)
                        ->whereIn('status', ['pending', 'on_progress'])
                        ->count(),
                    'targets_done' => WorkTarget::where('user_id', $userId)
                        ->where('status', 'done')
                        ->count(),
                    'plans_today' => WorkPlan::where('user_id', $userId)
                        ->where('is_done', false)
                        ->whereDate('due_at', $now->toDateString())
                        ->count(),
                    'plans_overdue' => WorkPlan::where('user_id', $userId)
                        ->where('is_done', false)
                        ->whereNotNull('due_at')
                        ->whereDate('due_at', '<', $now->toDateString())
                        ->count(),
                ],
            ],
        ]);
    }
}
