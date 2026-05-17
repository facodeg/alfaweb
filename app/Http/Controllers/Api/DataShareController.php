<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DataShare;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DataShareController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'OK',
            'data' => $this->shares($request),
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ]);

        $target = User::where('email', $data['email'])->firstOrFail();

        abort_if($target->id === $request->user()->id, 422, 'Tidak bisa berbagi dengan email sendiri.');

        $share = DataShare::firstOrCreate([
            'owner_id' => min($request->user()->id, $target->id),
            'shared_with_id' => max($request->user()->id, $target->id),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Berbagi data berhasil diaktifkan.',
            'data' => $share->load(['owner', 'sharedWith']),
        ], 201);
    }

    public function destroy(Request $request, DataShare $dataShare): JsonResponse
    {
        abort_unless(
            $dataShare->owner_id === $request->user()->id || $dataShare->shared_with_id === $request->user()->id,
            403,
            'Data sharing tidak tersedia untuk akun ini.'
        );

        $dataShare->delete();

        return response()->json([
            'success' => true,
            'message' => 'Berbagi data dihentikan.',
        ]);
    }

    private function shares(Request $request)
    {
        return DataShare::with(['owner', 'sharedWith'])
            ->where('owner_id', $request->user()->id)
            ->orWhere('shared_with_id', $request->user()->id)
            ->latest()
            ->get();
    }
}
