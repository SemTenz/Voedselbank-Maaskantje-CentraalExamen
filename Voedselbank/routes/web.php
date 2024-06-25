<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoedselPakketController;

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

Route::get('/voedselpakket', [VoedselPakketController::class, 'index'])->name('voedselpakket.index');
Route::get('/voedselpakket/create', [VoedselPakketController::class, 'create'])->name('voedselpakket.create');
Route::post('/voedselpakket', [VoedselPakketController::class, 'store'])->name('voedselpakket.store');
Route::get('/voedselpakket/{voedselpakket}/edit', [VoedselPakketController::class, 'edit'])->name('voedselpakket.edit');
Route::put('/voedselpakket/{voedselpakket}', [VoedselPakketController::class, 'update'])->name('voedselpakket.update');
Route::delete('/voedselpakket/{voedselpakket}', [VoedselPakketController::class, 'destroy'])->name('voedselpakket.destroy');
require __DIR__ . '/auth.php';
