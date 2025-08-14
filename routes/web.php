<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
    Route::put('applicant/profile/{profile}', [ProfileController::class, 'update'])->name('applicant.profile.update');

    Route::post('/profile/{profile}/attachment', [ProfileAttachmentController::class, 'store'])->name('profile.attachment.store');
    Route::delete('/profile/attachment/{attachment}', [ProfileAttachmentController::class, 'destroy'])->name('profile.attachment.destroy');
});


require __DIR__.'/auth.php';
