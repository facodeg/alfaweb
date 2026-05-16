<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LifeSchedule;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LifeScheduleController extends Controller
{
    /**
     * Daftar schedule (master).
     * Optional query: date=YYYY-MM-DD untuk dapat occurrence di tanggal tsb.
     */
    public function index(Request $request): JsonResponse
    {
        $userId = $request->user()->id;
        $date = $request->query('date');

        $base = LifeSchedule::where('user_id', $userId)
            ->orderBy('start_at')
            ->get();

        if ($date) {
            $target = Carbon::parse($date);
            $occurrences = $base
                ->filter(fn (LifeSchedule $s) => $s->occursOn($target))
                ->values()
                ->map(fn (LifeSchedule $s) => $this->toOccurrence($s, $target));

            return response()->json([
                'success' => true,
                'message' => 'OK',
                'data' => $occurrences,
                'meta' => ['date' => $target->toDateString()],
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'OK',
            'data' => $base,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $this->validateData($request);
        $data['user_id'] = $request->user()->id;
        $schedule = LifeSchedule::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Jadwal tersimpan.',
            'data' => $schedule,
        ], 201);
    }

    public function show(Request $request, LifeSchedule $lifeSchedule): JsonResponse
    {
        $this->authorizeOwner($request, $lifeSchedule);
        return response()->json([
            'success' => true,
            'message' => 'OK',
            'data' => $lifeSchedule,
        ]);
    }

    public function update(Request $request, LifeSchedule $lifeSchedule): JsonResponse
    {
        $this->authorizeOwner($request, $lifeSchedule);
        $lifeSchedule->update($this->validateData($request, partial: true));

        return response()->json([
            'success' => true,
            'message' => 'Jadwal diperbarui.',
            'data' => $lifeSchedule,
        ]);
    }

    public function destroy(Request $request, LifeSchedule $lifeSchedule): JsonResponse
    {
        $this->authorizeOwner($request, $lifeSchedule);
        $lifeSchedule->delete();

        return response()->json([
            'success' => true,
            'message' => 'Jadwal dihapus.',
        ]);
    }

    private function toOccurrence(LifeSchedule $s, Carbon $date): array
    {
        // Sesuaikan jam start/end dengan tanggal target.
        $start = $date->copy()->setTimeFrom($s->start_at);
        $end = $date->copy()->setTimeFrom($s->end_at);
        // Kalau end < start (lewat tengah malam), majukan end ke hari berikutnya.
        if ($end->lessThan($start)) {
            $end->addDay();
        }

        return [
            'id' => $s->id,
            'title' => $s->title,
            'description' => $s->description,
            'category' => $s->category,
            'color' => $s->color,
            'repeat' => $s->repeat,
            'start_at' => $start->toIso8601String(),
            'end_at' => $end->toIso8601String(),
            'is_recurring' => $s->repeat !== 'none',
        ];
    }

    private function validateData(Request $request, bool $partial = false): array
    {
        $rules = [
            'title' => [$partial ? 'sometimes' : 'required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5000'],
            'category' => ['nullable', 'string', 'max:80'],
            'start_at' => [$partial ? 'sometimes' : 'required', 'date'],
            'end_at' => [$partial ? 'sometimes' : 'required', 'date', 'after_or_equal:start_at'],
            'repeat' => ['nullable', 'in:none,daily,weekly,monthly'],
            'repeat_days' => ['nullable', 'string', 'max:64'],
            'color' => ['nullable', 'string', 'max:16'],
        ];

        return $request->validate($rules);
    }

    private function authorizeOwner(Request $request, LifeSchedule $schedule): void
    {
        abort_unless($schedule->user_id === $request->user()->id, 403, 'Bukan milik Anda.');
    }
}
