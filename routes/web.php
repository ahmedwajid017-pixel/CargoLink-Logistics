<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/documents', [DocumentController::class, 'index'])
    ->name('documents.index');

    Route::post('/documents', [DocumentController::class, 'store'])
     ->name('documents.store');

        Route::get('/documents/{document}/download', [DocumentController::class, 'download'])
      ->name('documents.download');
      Route::get('/notifications', [NotificationController::class, 'index'])
    ->name('notifications.index');

Route::patch('/notifications/{notification}/read', [NotificationController::class, 'markRead'])
    ->name('notifications.read');
});


require __DIR__.'/auth.php';