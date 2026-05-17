<?php

namespace App\Services;

use App\Models\AiSetting;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class OpenRouterService
{
    public function generateFormDraft(string $module, string $prompt): array
    {
        $schema = $this->formSchemas()[$module] ?? null;

        if (! $schema) {
            throw new RuntimeException('Modul ini belum mendukung bantuan AI.');
        }

        return $this->completeJson(
            'Anda adalah asisten input data AlfaApps. Balas hanya JSON valid tanpa markdown. Isi field sesuai schema modul dan instruksi user.',
            $this->formPrompt($module, $prompt, $schema),
        );
    }

    public function generateWorkPlanDraft(string $prompt): array
    {
        $draft = $this->generateFormDraft('work-plans', $prompt);

        return [
            'title' => (string) ($draft['title'] ?? 'Rencana kerja baru'),
            'description' => (string) ($draft['description'] ?? $prompt),
            'priority' => in_array(($draft['priority'] ?? 'medium'), ['low', 'medium', 'high'], true) ? $draft['priority'] : 'medium',
            'due_at' => $draft['due_at'] ?? null,
        ];
    }

    private function completeJson(string $systemPrompt, string $userPrompt): array
    {
        $settings = AiSetting::current();

        if (! $settings->enabled) {
            throw new RuntimeException('AI belum diaktifkan di pengaturan.');
        }

        if (! $settings->api_key) {
            throw new RuntimeException('OpenRouter API key belum diisi di database.');
        }

        $response = Http::withToken($settings->api_key)
            ->withHeaders([
                'HTTP-Referer' => config('app.url'),
                'X-Title' => config('app.name', 'AlfaApps'),
            ])
            ->timeout(45)
            ->post(rtrim($settings->base_url, '/') . '/chat/completions', [
                'model' => $settings->model,
                'messages' => [
                    ['role' => 'system', 'content' => $systemPrompt],
                    ['role' => 'user', 'content' => $userPrompt],
                ],
                'temperature' => 0.3,
            ]);

        if ($response->failed()) {
            throw new RuntimeException('OpenRouter gagal merespons: ' . $response->body());
        }

        $content = data_get($response->json(), 'choices.0.message.content');

        if (! is_string($content) || trim($content) === '') {
            throw new RuntimeException('Respons AI kosong atau tidak valid.');
        }

        return $this->decodeJson($content);
    }

    private function workPlanPrompt(string $prompt): string
    {
        return <<<PROMPT
Instruksi user:
{$prompt}

Buat JSON dengan field:
- title: string singkat maksimal 80 karakter
- description: string detail langkah kerja dalam Bahasa Indonesia
- priority: salah satu low, medium, high
- due_at: tanggal waktu format ISO 8601 jika user menyebut deadline, atau null
PROMPT;
    }

    private function formPrompt(string $module, string $prompt, array $schema): string
    {
        $schemaJson = json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        return <<<PROMPT
Modul: {$module}
Instruksi user:
{$prompt}

Isi JSON sesuai schema ini. Gunakan null jika data tidak disebut user. Tanggal gunakan format ISO 8601 untuk datetime atau YYYY-MM-DD untuk date.
{$schemaJson}
PROMPT;
    }

    private function formSchemas(): array
    {
        return [
            'finance' => [
                'type' => 'income|expense',
                'amount' => 'number|null',
                'category' => 'string|null',
                'note' => 'string|null',
                'occurred_at' => 'ISO8601 datetime|null',
            ],
            'income-targets' => [
                'title' => 'string',
                'period' => 'weekly|monthly|yearly',
                'target_amount' => 'number|null',
                'period_start' => 'YYYY-MM-DD|null',
                'period_end' => 'YYYY-MM-DD|null',
                'note' => 'string|null',
            ],
            'work-targets' => [
                'title' => 'string',
                'description' => 'string|null',
                'deadline' => 'YYYY-MM-DD|null',
                'status' => 'pending|on_progress|done',
                'progress' => 'integer 0..100|null',
            ],
            'work-plans' => [
                'title' => 'string',
                'description' => 'string|null',
                'priority' => 'low|medium|high',
                'due_at' => 'ISO8601 datetime|null',
            ],
            'life-schedules' => [
                'title' => 'string',
                'description' => 'string|null',
                'category' => 'string|null',
                'start_at' => 'ISO8601 datetime|null',
                'end_at' => 'ISO8601 datetime|null',
                'repeat' => 'none|daily|weekly|monthly',
                'color' => 'hex color|null',
            ],
            'vacations' => [
                'title' => 'string',
                'destination' => 'string',
                'description' => 'string|null',
                'start_date' => 'YYYY-MM-DD|null',
                'end_date' => 'YYYY-MM-DD|null',
                'budget' => 'number|null',
                'status' => 'planned|booked|ongoing|completed|cancelled',
                'address' => 'string|null',
                'latitude' => 'number|null',
                'longitude' => 'number|null',
                'map_url' => 'string|null',
                'notes' => 'string|null',
            ],
        ];
    }

    private function decodeJson(string $content): array
    {
        $content = trim($content);
        $content = preg_replace('/^```(?:json)?\s*/', '', $content) ?? $content;
        $content = preg_replace('/\s*```$/', '', $content) ?? $content;

        $data = json_decode($content, true);

        if (! is_array($data)) {
            throw new RuntimeException('Respons AI bukan JSON valid.');
        }

        return $data;
    }
}
