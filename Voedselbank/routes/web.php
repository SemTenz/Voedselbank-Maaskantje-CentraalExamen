<?php

use App\Http\Controllers\AllergieController;
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


Route::middleware('auth')->group(function () {
    Route::get('/allergie', [AllergieController::class, 'index'])->name('allergie.index');
    Route::post('/allergie', [AllergieController::class, 'store'])->name('allergie.store');
    Route::get('/allergie/create', [AllergieController::class, 'create'])->name('allergie.create');
    // Route for showing the form to edit an existing Allergie
    Route::get('/allergie/{id}/edit', [AllergieController::class, 'edit'])->name('allergie.edit');
    // Route for updating the Allergie
    Route::put('/allergie/{id}', [AllergieController::class, 'update'])->name('allergie.update');
    Route::delete('/allergie/{id}', [AllergieController::class, 'destroy'])->name('allergie.destroy');
});

require __DIR__.'/auth.php';
