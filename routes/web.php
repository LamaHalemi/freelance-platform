<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/services', [ServiceController::class, 'index'])
    ->middleware('auth');

Route::get('/services/create', [ServiceController::class, 'create'])
    ->middleware('auth');

Route::get('/services/{service}', [ServiceController::class, 'show'])
    ->middleware('auth');

Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])
    ->middleware('auth');

Route::delete('/services/{service}', [ServiceController::class, 'destroy'])
    ->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
