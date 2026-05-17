<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FinanceRecord;
use App\Support\SharedData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FinanceRecordController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = FinanceRecord::query()
            ->whereIn('user_id', SharedData::userIds($request->user()))
            ->orderByDesc('occurred_at');

        if ($type = $request->query('type')) {
            $query->where('type', $type);
        }
        if ($from = $request->query('from')) {
            $query->whereDate('occurred_at', '>=', $from);
        }
        if ($to = $request->query('to')) {
            $query->whereDate('occurred_at', '<=', $to);
        }
        if ($search = $request->query('q')) {
            $query->where(function ($q) use ($search) {
                $q->where('note', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }

        $records = $query->limit((int) $request->query('limit', 100))->get();

        $totals = [
            'income' => (float) FinanceRecord::whereIn('user_id', SharedData::userIds($request->user()))
                ->where('type', 'income')->sum('amount'),
            'expense' => (float) FinanceRecord::whereIn('user_id', SharedData::userIds($request->user()))
                ->where('type', 'expense')->sum('amount'),
        ];
        $totals['balance'] = $totals['income'] - $totals['expense'];

        return response()->json([
            'success' => true,
            'message' => 'OK',
            'data' => $records,
            'meta' => ['totals' => $totals],
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $this->validateData($request);
        $data['user_id'] = $request->user()->id;
        $record = FinanceRecord::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data tersimpan.',
            'data' => $record,
        ], 201);
    }

    public function show(Request $request, FinanceRecord $financeRecord): JsonResponse
    {
        $this->authorizeVisible($request, $financeRecord);
        return response()->json([
            'success' => true,
            'message' => 'OK',
            'data' => $financeRecord,
        ]);
    }

    public function update(Request $request, FinanceRecord $financeRecord): JsonResponse
    {
        $this->authorizeOwner($request, $financeRecord);
        $financeRecord->update($this->validateData($request));

        return response()->json([
            'success' => true,
            'message' => 'Data diperbarui.',
            'data' => $financeRecord,
        ]);
    }

    public function destroy(Request $request, FinanceRecord $financeRecord): JsonResponse
    {
        $this->authorizeOwner($request, $financeRecord);
        $financeRecord->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data dihapus.',
        ]);
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'type' => ['required', 'in:income,expense'],
            'amount' => ['required', 'numeric', 'min:0'],
            'category' => ['nullable', 'string', 'max:80'],
            'note' => ['nullable', 'string', 'max:255'],
            'occurred_at' => ['required', 'date'],
        ]);
    }

    private function authorizeOwner(Request $request, FinanceRecord $record): void
    {
        abort_unless($record->user_id === $request->user()->id, 403, 'Bukan milik Anda.');
    }

    private function authorizeVisible(Request $request, FinanceRecord $record): void
    {
        abort_unless(in_array((int) $record->user_id, SharedData::userIds($request->user()), true), 403, 'Data tidak dibagikan dengan Anda.');
    }
}
