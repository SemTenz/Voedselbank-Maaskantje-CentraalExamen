<?php

use App\Http\Controllers\LeveranciersController;
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
