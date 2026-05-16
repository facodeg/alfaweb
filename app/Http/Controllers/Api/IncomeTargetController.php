<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FinanceRecord;
use App\Models\IncomeTarget;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IncomeTargetController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $targets = IncomeTarget::where('user_id', $request->user()->id)
            ->orderByDesc('period_start')
            ->get();

        // Hitung realisasi (income) per target sesuai rentang periode.
        $targets->each(function (IncomeTarget $target) use ($request) {
            $realized = (float) FinanceRecord::where('user_id', $request->user()->id)
                ->where('type', 'income')
                ->whereBetween('occurred_at', [
                    $target->period_start->startOfDay(),
                    $target->period_end->endOfDay(),
                ])->sum('amount');

            $target->setAttribute('realized_amount', $realized);
            $target->setAttribute(
                'progress',
                $target->target_amount > 0
                    ? round(min(100, ($realized / (float) $target->target_amount) * 100), 2)
                    : 0
            );
        });

        return response()->json([
            'success' => true,
            'message' => 'OK',
            'data' => $targets,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $this->validateData($request);
        $data['user_id'] = $request->user()->id;
        $target = IncomeTarget::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Target tersimpan.',
            'data' => $target,
        ], 201);
    }

    public function show(Request $request, IncomeTarget $incomeTarget): JsonResponse
    {
        $this->authorizeOwner($request, $incomeTarget);
        return response()->json([
            'success' => true,
            'message' => 'OK',
            'data' => $incomeTarget,
        ]);
    }

    public function update(Request $request, IncomeTarget $incomeTarget): JsonResponse
    {
        $this->authorizeOwner($request, $incomeTarget);
        $incomeTarget->update($this->validateData($request));

        return response()->json([
            'success' => true,
            'message' => 'Target diperbarui.',
            'data' => $incomeTarget,
        ]);
    }

    public function destroy(Request $request, IncomeTarget $incomeTarget): JsonResponse
    {
        $this->authorizeOwner($request, $incomeTarget);
        $incomeTarget->delete();

        return response()->json([
            'success' => true,
            'message' => 'Target dihapus.',
        ]);
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'period' => ['required', 'in:weekly,monthly,yearly'],
            'period_start' => ['required', 'date'],
            'period_end' => ['required', 'date', 'after_or_equal:period_start'],
            'target_amount' => ['required', 'numeric', 'min:0'],
            'note' => ['nullable', 'string', 'max:1000'],
        ]);
    }

    private function authorizeOwner(Request $request, IncomeTarget $target): void
    {
        abort_unless($target->user_id === $request->user()->id, 403, 'Bukan milik Anda.');
    }
}
