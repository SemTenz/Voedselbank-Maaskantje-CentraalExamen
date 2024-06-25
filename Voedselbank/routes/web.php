<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoedselPakketController;
use App\Http\Controllers\KlantenController;
use App\Http\Controllers\ProductController;

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

Route::get('/klant', [KlantenController::class, 'index'])->name('klant.index');
Route::get('/klant/create', [KlantenController::class, 'create'])->name('klant.create');
Route::post('/klant', [KlantenController::class, 'store'])->name('klant.store');
Route::get('/klant/{klant}/edit', [KlantenController::class, 'edit'])->name('klant.edit');
Route::put('/klant/{klant}', [KlantenController::class, 'update'])->name('klant.update');
Route::delete('/klant/{klant}', [KlantenController::class, 'destroy'])->name('klant.destroy');







Route::get('/voedselpakket', [VoedselPakketController::class, 'index'])->name('voedselpakket.index');
Route::get('/voedselpakket/create/{klant_id}', [VoedselPakketController::class, 'create'])->name('voedselpakket.create');
Route::post('/voedselpakket', [VoedselPakketController::class, 'store'])->name('voedselpakket.store');
Route::get('/voedselpakket/{voedselpakket}/edit', [VoedselPakketController::class, 'edit'])->name('voedselpakket.edit');
Route::put('/voedselpakket/{voedselpakket}', [VoedselPakketController::class, 'update'])->name('voedselpakket.update');
Route::delete('/voedselpakket/{voedselpakket}', [VoedselPakketController::class, 'destroy'])->name('voedselpakket.destroy');




Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

require __DIR__ . '/auth.php';
