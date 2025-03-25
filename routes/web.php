<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'loginAttempt'])->name('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

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