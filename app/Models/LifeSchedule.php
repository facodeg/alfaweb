<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LifeSchedule extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'category',
        'start_at',
        'end_at',
        'repeat',
        'repeat_days',
        'color',
    ];

    protected function casts(): array
    {
        return [
            'start_at' => 'datetime',
            'end_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Apakah schedule ini terjadi pada $date (DateTime).
     * Mengembalikan instance virtual (bukan persisted) bila berulang.
     */
    public function occursOn(\DateTimeInterface $date): bool
    {
        $start = $this->start_at;
        $end = $this->end_at;

        // Non-repeat: cocok kalau tanggal sama dengan tanggal start.
        if ($this->repeat === 'none') {
            return $start->isSameDay($date);
        }

        // Sebelum start_at → tidak terjadi.
        if ($date < $start->copy()->startOfDay()) {
            return false;
        }

        return match ($this->repeat) {
            'daily' => true,
            'weekly' => $this->matchesWeekly($date),
            'monthly' => (int) $start->format('d') === (int) $date->format('d'),
            default => false,
        };
    }

    private function matchesWeekly(\DateTimeInterface $date): bool
    {
        $map = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];
        // Carbon: dayOfWeek 0..6 (Sun..Sat). Kita pakai dayOfWeekIso 1..7 (Mon..Sun).
        $iso = (int) $date->format('N'); // 1..7 Mon..Sun
        $token = $map[$iso - 1];

        if (empty($this->repeat_days)) {
            // Default: ulang di hari yang sama dengan start_at.
            $tokenStart = $map[((int) $this->start_at->format('N')) - 1];
            return $token === $tokenStart;
        }

        $days = array_map('trim', explode(',', strtolower($this->repeat_days)));
        return in_array($token, $days, true);
    }
}
