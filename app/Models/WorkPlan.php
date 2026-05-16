<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkPlan extends Model
{
    protected $fillable = [
        'user_id',
        'work_target_id',
        'title',
        'description',
        'priority',
        'due_at',
        'is_done',
    ];

    protected function casts(): array
    {
        return [
            'due_at' => 'datetime',
            'is_done' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function workTarget(): BelongsTo
    {
        return $this->belongsTo(WorkTarget::class);
    }
}
