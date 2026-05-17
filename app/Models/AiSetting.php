<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AiSetting extends Model
{
    protected $fillable = [
        'enabled',
        'provider',
        'base_url',
        'model',
        'api_key',
    ];

    protected $hidden = [
        'api_key',
    ];

    protected function casts(): array
    {
        return [
            'enabled' => 'boolean',
            'api_key' => 'encrypted',
        ];
    }

    public static function current(): self
    {
        return self::query()->firstOrCreate([], [
            'enabled' => false,
            'provider' => 'openrouter',
            'base_url' => 'https://openrouter.ai/api/v1',
            'model' => 'openai/gpt-4o-mini',
        ]);
    }
}
