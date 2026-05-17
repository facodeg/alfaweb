<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Learning;
use App\Support\SharedData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LearningController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Learning::whereIn('user_id', SharedData::userIds($request->user()))
            ->orderByRaw("FIELD(status, 'learning', 'planned', 'done')")
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
        $learning = Learning::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Pembelajaran tersimpan.',
            'data' => $learning,
        ], 201);
    }

    public function show(Request $request, Learning $learning): JsonResponse
    {
        $this->authorizeVisible($request, $learning);
        return response()->json([
            'success' => true,
            'message' => 'OK',
            'data' => $learning,
        ]);
    }

    public function update(Request $request, Learning $learning): JsonResponse
    {
        $this->authorizeOwner($request, $learning);
        $learning->update($this->validateData($request, partial: true));

        return response()->json([
            'success' => true,
            'message' => 'Pembelajaran diperbarui.',
            'data' => $learning,
        ]);
    }

    public function destroy(Request $request, Learning $learning): JsonResponse
    {
        $this->authorizeOwner($request, $learning);
        $learning->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pembelajaran dihapus.',
        ]);
    }

    private function validateData(Request $request, bool $partial = false): array
    {
        return $request->validate([
            'title' => [$partial ? 'sometimes' : 'required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5000'],
            'source_url' => ['nullable', 'string', 'max:1000'],
            'category' => ['nullable', 'string', 'max:80'],
            'status' => ['nullable', 'in:planned,learning,done'],
            'progress' => ['nullable', 'integer', 'min:0', 'max:100'],
        ]);
    }

    private function authorizeOwner(Request $request, Learning $learning): void
    {
        abort_unless($learning->user_id === $request->user()->id, 403, 'Bukan milik Anda.');
    }

    private function authorizeVisible(Request $request, Learning $learning): void
    {
        abort_unless(in_array((int) $learning->user_id, SharedData::userIds($request->user()), true), 403, 'Data tidak dibagikan dengan Anda.');
    }
}
