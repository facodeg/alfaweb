<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vacation;
use App\Support\SharedData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VacationController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Vacation::query()
            ->whereIn('user_id', SharedData::userIds($request->user()))
            ->orderByRaw("CASE status WHEN 'ongoing' THEN 1 WHEN 'booked' THEN 2 WHEN 'planned' THEN 3 WHEN 'completed' THEN 4 ELSE 5 END")
            ->orderByRaw('start_date IS NULL')
            ->orderBy('start_date');

        if ($status = $request->query('status')) {
            $query->where('status', $status);
        }

        if ($search = $request->query('q')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('destination', 'like', "%{$search}%")
                    ->orWhere('address', 'like', "%{$search}%");
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
        $vacation = Vacation::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Liburan tersimpan.',
            'data' => $vacation,
        ], 201);
    }

    public function show(Request $request, Vacation $vacation): JsonResponse
    {
        $this->authorizeVisible($request, $vacation);

        return response()->json([
            'success' => true,
            'message' => 'OK',
            'data' => $vacation,
        ]);
    }

    public function update(Request $request, Vacation $vacation): JsonResponse
    {
        $this->authorizeOwner($request, $vacation);
        $vacation->update($this->validateData($request, partial: true));

        return response()->json([
            'success' => true,
            'message' => 'Liburan diperbarui.',
            'data' => $vacation,
        ]);
    }

    public function destroy(Request $request, Vacation $vacation): JsonResponse
    {
        $this->authorizeOwner($request, $vacation);
        $vacation->delete();

        return response()->json([
            'success' => true,
            'message' => 'Liburan dihapus.',
        ]);
    }

    private function validateData(Request $request, bool $partial = false): array
    {
        return $request->validate([
            'title' => [$partial ? 'sometimes' : 'required', 'string', 'max:255'],
            'destination' => [$partial ? 'sometimes' : 'required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5000'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'budget' => ['nullable', 'numeric', 'min:0'],
            'status' => ['nullable', 'in:planned,booked,ongoing,completed,cancelled'],
            'address' => ['nullable', 'string', 'max:255'],
            'latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'longitude' => ['nullable', 'numeric', 'between:-180,180'],
            'map_url' => ['nullable', 'string', 'max:1000'],
            'notes' => ['nullable', 'string', 'max:5000'],
        ]);
    }

    private function authorizeOwner(Request $request, Vacation $vacation): void
    {
        abort_unless($vacation->user_id === $request->user()->id, 403, 'Bukan milik Anda.');
    }

    private function authorizeVisible(Request $request, Vacation $vacation): void
    {
        abort_unless(in_array((int) $vacation->user_id, SharedData::userIds($request->user()), true), 403, 'Data tidak dibagikan dengan Anda.');
    }
}
