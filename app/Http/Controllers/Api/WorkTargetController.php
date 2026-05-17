<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WorkTarget;
use App\Models\WorkTargetChangeRequest;
use App\Support\SharedData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WorkTargetController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = WorkTarget::query()
            ->whereIn('user_id', SharedData::userIds($request->user()))
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
        $this->authorizeVisible($request, $workTarget);
        $workTarget->load('plans');
        return response()->json([
            'success' => true,
            'message' => 'OK',
            'data' => $workTarget,
        ]);
    }

    public function update(Request $request, WorkTarget $workTarget): JsonResponse
    {
        $this->authorizeVisible($request, $workTarget);
        $data = $this->validateData($request, partial: true);

        if ($workTarget->user_id !== $request->user()->id) {
            $changeRequest = WorkTargetChangeRequest::updateOrCreate(
                [
                    'work_target_id' => $workTarget->id,
                    'requested_by_id' => $request->user()->id,
                    'status' => 'pending',
                ],
                ['proposed_changes' => $data],
            );

            return response()->json([
                'success' => true,
                'message' => 'Perubahan diajukan dan menunggu persetujuan pemilik.',
                'data' => $changeRequest->load(['workTarget', 'requestedBy']),
            ], 202);
        }

        $workTarget->update($data);

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

    public function changeRequests(Request $request): JsonResponse
    {
        $changeRequests = WorkTargetChangeRequest::with(['workTarget', 'requestedBy'])
            ->where('status', 'pending')
            ->whereHas('workTarget', fn ($query) => $query->where('user_id', $request->user()->id))
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'OK',
            'data' => $changeRequests,
        ]);
    }

    public function approveChangeRequest(Request $request, WorkTargetChangeRequest $changeRequest): JsonResponse
    {
        $changeRequest->load('workTarget');
        abort_unless($changeRequest->status === 'pending', 404);
        abort_unless($changeRequest->workTarget->user_id === $request->user()->id, 403, 'Bukan pemilik target.');

        $changeRequest->workTarget->update($changeRequest->proposed_changes);
        $changeRequest->update([
            'status' => 'approved',
            'reviewed_by_id' => $request->user()->id,
            'reviewed_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Perubahan disetujui.',
            'data' => $changeRequest->load(['workTarget', 'requestedBy']),
        ]);
    }

    public function rejectChangeRequest(Request $request, WorkTargetChangeRequest $changeRequest): JsonResponse
    {
        $changeRequest->load('workTarget');
        abort_unless($changeRequest->status === 'pending', 404);
        abort_unless($changeRequest->workTarget->user_id === $request->user()->id, 403, 'Bukan pemilik target.');

        $changeRequest->update([
            'status' => 'rejected',
            'reviewed_by_id' => $request->user()->id,
            'reviewed_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Perubahan ditolak.',
            'data' => $changeRequest->load(['workTarget', 'requestedBy']),
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

    private function authorizeVisible(Request $request, WorkTarget $target): void
    {
        abort_unless(in_array((int) $target->user_id, SharedData::userIds($request->user()), true), 403, 'Data tidak dibagikan dengan Anda.');
    }
}
