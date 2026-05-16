<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\FinanceRecordController;
use App\Http\Controllers\Api\IncomeTargetController;
use App\Http\Controllers\Api\LearningController;
use App\Http\Controllers\Api\LifeScheduleController;
use App\Http\Controllers\Api\NoteController;
use App\Http\Controllers\Api\WorkPlanController;
use App\Http\Controllers\Api\WorkTargetController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public routes
|--------------------------------------------------------------------------
*/
Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('google', [AuthController::class, 'googleLogin']);
});

/*
|--------------------------------------------------------------------------
| Protected routes (Sanctum)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('me', [AuthController::class, 'me']);
        Route::post('logout', [AuthController::class, 'logout']);
    });

    // Dashboard
    Route::get('dashboard/summary', [DashboardController::class, 'summary']);

    // Finance records
    Route::apiResource('finance-records', FinanceRecordController::class)
        ->parameters(['finance-records' => 'financeRecord']);

    // Income targets
    Route::apiResource('income-targets', IncomeTargetController::class)
        ->parameters(['income-targets' => 'incomeTarget']);

    // Work targets
    Route::apiResource('work-targets', WorkTargetController::class)
        ->parameters(['work-targets' => 'workTarget']);

    // Work plans (todo/checklist)
    Route::post('work-plans/{workPlan}/toggle', [WorkPlanController::class, 'toggle']);
    Route::apiResource('work-plans', WorkPlanController::class)
        ->parameters(['work-plans' => 'workPlan']);

    // Life schedules
    Route::apiResource('life-schedules', LifeScheduleController::class)
        ->parameters(['life-schedules' => 'lifeSchedule']);

    // Notes
    Route::post('notes/{note}/pin', [NoteController::class, 'togglePin']);
    Route::apiResource('notes', NoteController::class);

    // Learnings
    Route::apiResource('learnings', LearningController::class);
});
