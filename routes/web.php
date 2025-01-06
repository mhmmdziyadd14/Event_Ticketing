<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Filament\Facades\Filament;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TransaksiController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/event', function () {
    return view('events');
})->name('event');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

Route::get('organizer', function () {
    return view('dashboard_organizer');
})->middleware(['auth', 'verified', 'role:organizer|admin']);


Route::middleware(['auth', 'verified', 'role:user'])->group(function () {
    // Existing routes...
    Route::get('user', [EventController::class, 'userDashboard'])
        ->name('user')
        ->middleware(['auth', 'verified', 'role:user']);
    
    // Add this route for storing transactions
    Route::post('/transactions', [TransaksiController::class, 'store'])
        ->name('transactions.store');
});




Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
Route::middleware(['auth', 'verified', 'role:organizer'])->group(function () {
    Route::get('organizer', [EventController::class, 'index'])->name('organizer');
    Route::post('events', [EventController::class, 'store'])->name('events.store');
});
require __DIR__ . '/auth.php';

