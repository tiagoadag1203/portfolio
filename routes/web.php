<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'loginAttempt')->name('auth');
    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function() {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::prefix('dashboard')->group(function () {
        Route::resource('personal-info', PersonalInfoController::class);
        Route::resource('skills', SkillController::class);
        Route::resource('certificates', CertificateController::class);
        Route::resource('experiences', ExperienceController::class);
        Route::resource('projects', ProjectController::class);
    });
});