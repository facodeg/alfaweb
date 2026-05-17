<?php

use App\Http\Controllers\Web\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'showLogin'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::get('/auth/google/redirect', [AuthController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('login.google.callback');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => view('app', ['page' => 'dashboard']))->name('dashboard');
    Route::get('/finance', fn () => view('app', ['page' => 'finance']))->name('web.finance.index');
    Route::get('/income-targets', fn () => view('app', ['page' => 'income-targets']))->name('web.income-targets.index');
    Route::get('/work-targets', fn () => view('app', ['page' => 'work-targets']))->name('web.work-targets.index');
    Route::get('/work-plans', fn () => view('app', ['page' => 'work-plans']))->name('web.work-plans.index');
    Route::get('/life-schedules', fn () => view('app', ['page' => 'life-schedules']))->name('web.life-schedules.index');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
