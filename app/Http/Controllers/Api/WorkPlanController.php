<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WorkPlan;
use App\Models\WorkTarget;
use App\Support\SharedData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WorkPlanController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = WorkPlan::query()
            ->whereIn('user_id', SharedData::userIds($request->user()))
            ->orderBy('is_done')
            ->orderByRaw("FIELD(priority, 'high', 'medium', 'low')")
            ->orderByRaw('due_at IS NULL')
            ->orderBy('due_at');

        if ($request->boolean('only_open')) {
            $query->where('is_done', false);
        }
        if ($targetId = $request->query('work_target_id')) {
            $query->where('work_target_id', $targetId);
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
        $this->ensureTargetOwnership($request, $data['work_target_id'] ?? null);
        $data['user_id'] = $request->user()->id;
        $plan = WorkPlan::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Rencana tersimpan.',
            'data' => $plan,
        ], 201);
    }

    public function show(Request $request, WorkPlan $workPlan): JsonResponse
    {
        $this->authorizeVisible($request, $workPlan);
        return response()->json([
            'success' => true,
            'message' => 'OK',
            'data' => $workPlan,
        ]);
    }

    public function update(Request $request, WorkPlan $workPlan): JsonResponse
    {
        $this->authorizeOwner($request, $workPlan);
        $data = $this->validateData($request, partial: true);
        $this->ensureTargetOwnership($request, $data['work_target_id'] ?? null);
        $workPlan->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Rencana diperbarui.',
            'data' => $workPlan,
        ]);
    }

    public function destroy(Request $request, WorkPlan $workPlan): JsonResponse
    {
        $this->authorizeOwner($request, $workPlan);
        $workPlan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Rencana dihapus.',
        ]);
    }

    /**
     * Toggle is_done.
     */
    public function toggle(Request $request, WorkPlan $workPlan): JsonResponse
    {
        $this->authorizeOwner($request, $workPlan);
        $workPlan->update(['is_done' => ! $workPlan->is_done]);

        return response()->json([
            'success' => true,
            'message' => $workPlan->is_done ? 'Selesai.' : 'Belum selesai.',
            'data' => $workPlan,
        ]);
    }

    private function validateData(Request $request, bool $partial = false): array
    {
        return $request->validate([
            'work_target_id' => ['nullable', 'integer', 'exists:work_targets,id'],
            'title' => [$partial ? 'sometimes' : 'required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5000'],
            'priority' => ['nullable', 'in:low,medium,high'],
            'due_at' => ['nullable', 'date'],
            'is_done' => ['nullable', 'boolean'],
        ]);
    }

    private function ensureTargetOwnership(Request $request, ?int $targetId): void
    {
        if ($targetId === null) return;
        $exists = WorkTarget::where('id', $targetId)
            ->where('user_id', $request->user()->id)
            ->exists();
        abort_unless($exists, 403, 'Target bukan milik Anda.');
    }

    private function authorizeOwner(Request $request, WorkPlan $plan): void
    {
        abort_unless($plan->user_id === $request->user()->id, 403, 'Bukan milik Anda.');
    }

    private function authorizeVisible(Request $request, WorkPlan $plan): void
    {
        abort_unless(in_array((int) $plan->user_id, SharedData::userIds($request->user()), true), 403, 'Data tidak dibagikan dengan Anda.');
    }
}
