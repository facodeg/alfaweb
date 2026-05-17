<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkTargetChangeRequest extends Model
{
    protected $fillable = [
        'work_target_id',
        'requested_by_id',
        'reviewed_by_id',
        'proposed_changes',
        'status',
        'reviewed_at',
    ];

    protected function casts(): array
    {
        return [
            'proposed_changes' => 'array',
            'reviewed_at' => 'datetime',
        ];
    }

    public function workTarget(): BelongsTo
    {
        return $this->belongsTo(WorkTarget::class);
    }

    public function requestedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'requested_by_id');
    }

    public function reviewedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by_id');
    }
}
