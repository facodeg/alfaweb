<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Learning extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'source_url',
        'category',
        'status',
        'progress',
    ];

    protected function casts(): array
    {
        return [
            'progress' => 'integer',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
