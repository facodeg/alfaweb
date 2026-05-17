<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Support\SharedData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Note::whereIn('user_id', SharedData::userIds($request->user()))
            ->orderByDesc('is_pinned')
            ->orderByDesc('updated_at');

        if ($search = $request->query('q')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
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
        $note = Note::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Note tersimpan.',
            'data' => $note,
        ], 201);
    }

    public function show(Request $request, Note $note): JsonResponse
    {
        $this->authorizeVisible($request, $note);
        return response()->json([
            'success' => true,
            'message' => 'OK',
            'data' => $note,
        ]);
    }

    public function update(Request $request, Note $note): JsonResponse
    {
        $this->authorizeOwner($request, $note);
        $note->update($this->validateData($request, partial: true));

        return response()->json([
            'success' => true,
            'message' => 'Note diperbarui.',
            'data' => $note,
        ]);
    }

    public function destroy(Request $request, Note $note): JsonResponse
    {
        $this->authorizeOwner($request, $note);
        $note->delete();

        return response()->json([
            'success' => true,
            'message' => 'Note dihapus.',
        ]);
    }

    public function togglePin(Request $request, Note $note): JsonResponse
    {
        $this->authorizeOwner($request, $note);
        $note->update(['is_pinned' => ! $note->is_pinned]);

        return response()->json([
            'success' => true,
            'message' => $note->is_pinned ? 'Disematkan.' : 'Dilepas dari pin.',
            'data' => $note,
        ]);
    }

    private function validateData(Request $request, bool $partial = false): array
    {
        return $request->validate([
            'title' => [$partial ? 'sometimes' : 'required', 'string', 'max:255'],
            'content' => ['nullable', 'string'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['string', 'max:50'],
            'is_pinned' => ['nullable', 'boolean'],
            'color' => ['nullable', 'string', 'max:16'],
        ]);
    }

    private function authorizeOwner(Request $request, Note $note): void
    {
        abort_unless($note->user_id === $request->user()->id, 403, 'Bukan milik Anda.');
    }

    private function authorizeVisible(Request $request, Note $note): void
    {
        abort_unless(in_array((int) $note->user_id, SharedData::userIds($request->user()), true), 403, 'Data tidak dibagikan dengan Anda.');
    }
}
