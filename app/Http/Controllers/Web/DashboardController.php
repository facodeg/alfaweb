<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\FinanceRecord;
use App\Models\IncomeTarget;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(Request $request): View
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

        $recentRecords = FinanceRecord::where('user_id', $user->id)
            ->latest('occurred_at')
            ->limit(5)
            ->get();

        return view('dashboard', [
            'user' => $user,
            'summary' => [
                'month_income' => $monthIncome,
                'month_expense' => $monthExpense,
                'month_balance' => $monthIncome - $monthExpense,
                'today_income' => $todayIncome,
                'today_expense' => $todayExpense,
            ],
            'activeTarget' => $activeTarget,
            'targetProgress' => $targetProgress,
            'targetRealized' => $targetRealized,
            'recentRecords' => $recentRecords,
        ]);
    }
}
