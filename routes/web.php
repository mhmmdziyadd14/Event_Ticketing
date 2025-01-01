<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('admin', function(){
    return view('dashboard');
})->middleware(['auth', 'verified','role:admin']);

Route::get('organizer', function(){
    return view('dashboard');
})->middleware(['auth', 'verified','role:organizer|admin']);

Route::get('event', function(){
    return view('event');
})->middleware(['auth', 'verified','role_or_permission:view-event|admin']);

require __DIR__.'/auth.php';

