<?php

use App\Http\Controllers\LeveranciersController;
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
Route::get('/klant/{id}', [KlantenController::class, 'show'])->name('klant.show');
Route::delete('/voedselpakket/{id}', [VoedselPakketController::class, 'destroy'])->name('voedselpakket.destroy');


Route::get('/voedselpakket', [VoedselPakketController::class, 'index'])->name('voedselpakket.index');
Route::get('/voedselpakket/create/{klant_id}', [VoedselPakketController::class, 'create'])->name('voedselpakket.create');
Route::post('/voedselpakket', [VoedselPakketController::class, 'store'])->name('voedselpakket.store');
Route::get('/voedselpakket/{voedselpakket}/edit', [VoedselPakketController::class, 'edit'])->name('voedselpakket.edit');
Route::put('/voedselpakket/{voedselpakket}', [VoedselPakketController::class, 'update'])->name('voedselpakket.update');


// Routes voor magazijnmedewerkers
Route::middleware('checkusertype:magazijnmedewerker')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
});

require __DIR__ . '/auth.php';
Route::get('/leveranciers', [LeveranciersController::class, 'index'])
    ->name('leveranciers.index')
    ->middleware('checkusertype:magazijnmedewerker');

Route::get('/leveranciers/create', [LeveranciersController::class, 'create'])
    ->name('leveranciers.create')
    ->middleware('checkusertype:magazijnmedewerker');

Route::post('/leveranciers', [LeveranciersController::class, 'store'])
    ->name('leveranciers.store')
    ->middleware('checkusertype:magazijnmedewerker');

Route::get('/leveranciers/{leverancier}', [LeveranciersController::class, 'show'])
    ->name('leveranciers.show')
    ->middleware('checkusertype:magazijnmedewerker');

Route::get('/leveranciers/{leverancier}/edit', [LeveranciersController::class, 'edit'])
    ->name('leveranciers.edit')
    ->middleware('checkusertype:magazijnmedewerker');

Route::put('/leveranciers/{leverancier}', [LeveranciersController::class, 'update'])
    ->name('leveranciers.update')
    ->middleware('checkusertype:magazijnmedewerker');

Route::delete('/leveranciers/{leverancier}', [LeveranciersController::class, 'destroy'])
    ->name('leveranciers.destroy')
    ->middleware('checkusertype:magazijnmedewerker');



require __DIR__ . '/auth.php';
