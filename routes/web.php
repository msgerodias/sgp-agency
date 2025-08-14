<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileAttachmentController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Admin\ApplicationController as AdminApplicationController;

Route::get('/', function () {
    return view('welcome');
});

// Common dashboard route — can redirect based on role inside controller
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/application/{application}', [AdminDashboardController::class, 'show'])->name('admin.application.show');
    Route::post('/admin/application/{application}/update', [AdminDashboardController::class, 'updateStatus'])->name('admin.application.update');
});



// Applicant-only routes
Route::middleware(['auth', 'role:applicant'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
    Route::put('applicant/profile/{profile}', [ProfileController::class, 'update'])->name('applicant.profile.update');

    Route::post('/profile/{profile}/attachment', [ProfileAttachmentController::class, 'store'])->name('profile.attachment.store');
    Route::delete('/profile/attachment/{attachment}', [ProfileAttachmentController::class, 'destroy'])->name('profile.attachment.destroy');

    Route::get('/apply', [ApplicationController::class, 'create'])->name('applications.create');
    Route::post('/apply', [ApplicationController::class, 'store'])->name('applications.store');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/applications', [AdminApplicationController::class, 'index'])->name('applications.index');
    Route::get('/applications/{application}', [AdminApplicationController::class, 'show'])->name('applications.show');
    Route::put('/applications/{application}', [AdminApplicationController::class, 'update'])->name('applications.update');
});

require __DIR__.'/auth.php';
