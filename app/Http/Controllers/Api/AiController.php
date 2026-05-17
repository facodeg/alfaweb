<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\OpenRouterService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use RuntimeException;

class AiController extends Controller
{
    public function formDraft(Request $request, OpenRouterService $openRouter): JsonResponse
    {
        $data = $request->validate([
            'module' => ['required', 'string', 'max:80'],
            'prompt' => ['required', 'string', 'max:4000'],
        ]);

        try {
            return response()->json([
                'success' => true,
                'message' => 'Draft form berhasil dibuat.',
                'data' => $openRouter->generateFormDraft($data['module'], $data['prompt']),
            ]);
        } catch (RuntimeException $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
            ], 422);
        }
    }

    public function workPlanDraft(Request $request, OpenRouterService $openRouter): JsonResponse
    {
        $data = $request->validate([
            'prompt' => ['required', 'string', 'max:4000'],
        ]);

        try {
            return response()->json([
                'success' => true,
                'message' => 'Draft rencana kerja berhasil dibuat.',
                'data' => $openRouter->generateWorkPlanDraft($data['prompt']),
            ]);
        } catch (RuntimeException $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
            ], 422);
        }
    }
}
