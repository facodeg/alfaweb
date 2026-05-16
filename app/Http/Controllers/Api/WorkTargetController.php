<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WorkTarget;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WorkTargetController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = WorkTarget::query()
            ->where('user_id', $request->user()->id)
            ->orderByRaw("FIELD(status, 'on_progress', 'pending', 'done')")
            ->orderByDesc('updated_at');

        if ($status = $request->query('status')) {
            $query->where('status', $status);
        }

        return response()->json([
            'success' => true,
            'message' => 'OK',
            'data' => $query->get(),
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $this->validateData($request);
        $data['user_id'] = $request->user()->id;
        $target = WorkTarget::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Target tersimpan.',
            'data' => $target,
        ], 201);
    }

    public function show(Request $request, WorkTarget $workTarget): JsonResponse
    {
        $this->authorizeOwner($request, $workTarget);
        $workTarget->load('plans');
        return response()->json([
            'success' => true,
            'message' => 'OK',
            'data' => $workTarget,
        ]);
    }

    public function update(Request $request, WorkTarget $workTarget): JsonResponse
    {
        $this->authorizeOwner($request, $workTarget);
        $workTarget->update($this->validateData($request, partial: true));

        return response()->json([
            'success' => true,
            'message' => 'Target diperbarui.',
            'data' => $workTarget,
        ]);
    }

    public function destroy(Request $request, WorkTarget $workTarget): JsonResponse
    {
        $this->authorizeOwner($request, $workTarget);
        $workTarget->delete();

        return response()->json([
            'success' => true,
            'message' => 'Target dihapus.',
        ]);
    }

    private function validateData(Request $request, bool $partial = false): array
    {
        $rules = [
            'title' => [$partial ? 'sometimes' : 'required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5000'],
            'deadline' => ['nullable', 'date'],
            'status' => ['nullable', 'in:pending,on_progress,done'],
            'progress' => ['nullable', 'integer', 'min:0', 'max:100'],
        ];

        return $request->validate($rules);
    }

    private function authorizeOwner(Request $request, WorkTarget $target): void
    {
        abort_unless($target->user_id === $request->user()->id, 403, 'Bukan milik Anda.');
    }
}
