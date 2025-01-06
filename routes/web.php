<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Filament\Facades\Filament;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TransaksiController;

// Home/Welcome Route
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Dashboard Routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Event Routes
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User Routes
    Route::middleware(['verified', 'role:user'])->group(function () {
        Route::get('user', [EventController::class, 'userDashboard'])->name('user');
        Route::post('/transactions', [TransaksiController::class, 'store'])->name('transactions.store');
    });

    // Organizer Routes
    Route::middleware(['verified', 'role:organizer'])->group(function () {
        Route::get('organizer', [EventController::class, 'index'])->name('organizer');
        Route::post('events', [EventController::class, 'store'])->name('events.store');
        Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    });
});

// Include authentication routes
require __DIR__ . '/auth.php';