<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KnowledgeController;

Route::middleware('guest')->group(function () {

    Route::redirect('/', '/login');

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'processLogin']);

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'processRegister'])->name('register.process');

});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/predict', [PredictionController::class, 'index'])->name('prediction.index');
    Route::post('/predict', [PredictionController::class, 'predict'])->name('prediction.predict');

    Route::get('/history', [HistoryController::class, 'index'])->name('history.index');

    Route::get('/knowledge', [KnowledgeController::class, 'index'])
        ->name('knowledge.index');

    Route::get('/knowledge/{category}', [KnowledgeController::class, 'show'])
        ->name('knowledge.show');

    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile.index');

    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::view('/about', 'about.index')->name('about.index');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

});