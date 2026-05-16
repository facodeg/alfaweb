<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::get('/auth/google/redirect', [AuthController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('login.google.callback');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/finance', [DashboardController::class, 'finance'])->name('web.finance.index');
    Route::post('/finance', [DashboardController::class, 'storeFinance'])->name('web.finance.store');
    Route::delete('/finance/{financeRecord}', [DashboardController::class, 'destroyFinance'])->name('web.finance.destroy');

    Route::get('/income-targets', [DashboardController::class, 'incomeTargets'])->name('web.income-targets.index');
    Route::post('/income-targets', [DashboardController::class, 'storeIncomeTarget'])->name('web.income-targets.store');
    Route::delete('/income-targets/{incomeTarget}', [DashboardController::class, 'destroyIncomeTarget'])->name('web.income-targets.destroy');

    Route::get('/work-targets', [DashboardController::class, 'workTargets'])->name('web.work-targets.index');
    Route::post('/work-targets', [DashboardController::class, 'storeWorkTarget'])->name('web.work-targets.store');
    Route::delete('/work-targets/{workTarget}', [DashboardController::class, 'destroyWorkTarget'])->name('web.work-targets.destroy');

    Route::get('/work-plans', [DashboardController::class, 'workPlans'])->name('web.work-plans.index');
    Route::post('/work-plans', [DashboardController::class, 'storeWorkPlan'])->name('web.work-plans.store');
    Route::patch('/work-plans/{workPlan}/toggle', [DashboardController::class, 'toggleWorkPlan'])->name('web.work-plans.toggle');
    Route::delete('/work-plans/{workPlan}', [DashboardController::class, 'destroyWorkPlan'])->name('web.work-plans.destroy');

    Route::get('/life-schedules', [DashboardController::class, 'schedules'])->name('web.life-schedules.index');
    Route::post('/life-schedules', [DashboardController::class, 'storeSchedule'])->name('web.life-schedules.store');
    Route::delete('/life-schedules/{lifeSchedule}', [DashboardController::class, 'destroySchedule'])->name('web.life-schedules.destroy');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
