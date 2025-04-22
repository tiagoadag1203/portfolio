<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::controller(PortfolioController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'loginAttempt')->name('auth');
    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware('auth')->group(function () {
    // Route::get('/dashboard', function() {
    //     return view('admin.dashboard');
    // })->name('dashboard');
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });
    Route::prefix('dashboard')->group(function () {
        Route::resource('personal-info', PersonalInfoController::class)->only(['index', 'update']);
        Route::resource('skills', SkillController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('certificates', CertificateController::class)->only(['store', 'show', 'update', 'destroy']);
        Route::resource('experiences', ExperienceController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('projects', ProjectController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('messages', MessageController::class)->only(['destroy']);
    });
});

Route::resource('messages', MessageController::class)->only(['index', 'store']);