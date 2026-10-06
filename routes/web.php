<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SkillController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/services', [ServiceController::class, 'index'])
    ->middleware('auth');

Route::get('/services/create', [ServiceController::class, 'create'])
    ->middleware('auth');

Route::post('/services', [ServiceController::class, 'store'])
    ->middleware('auth');

Route::get('/services/{service}', [ServiceController::class, 'show'])
    ->middleware('auth');

Route::get('/services/{service}/offers', [ServiceController::class, 'offers'])
    ->middleware('auth');

Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])
    ->middleware('auth');

Route::put('/services/{service}', [ServiceController::class, 'update'])
    ->middleware('auth');

Route::delete('/services/{service}', [ServiceController::class, 'destroy'])
    ->middleware('auth');

Route::get('/services/{service}/offers/create', [ServiceController::class, 'createOffer'])
    ->middleware('auth');

Route::post('/services/{service}/offers', [ServiceController::class, 'storeOffer'])
    ->middleware('auth');

Route::get('/my-offers', [OfferController::class, 'index'])
    ->middleware('auth');

Route::get('/offers/{offer}/edit', [OfferController::class, 'edit'])
    ->middleware('auth');

Route::put('/offers/{offer}', [OfferController::class, 'update'])
    ->middleware('auth');

Route::delete('/offers/{offer}', [OfferController::class, 'destroy'])
    ->middleware('auth');

Route::put('/offers/{offer}/accept', [OfferController::class, 'accept'])
    ->middleware('auth');

Route::get('/my-projects', [ServiceController::class, 'myProjects'])
    ->middleware('auth');

Route::put('/projects/{service}/complete', [ServiceController::class, 'complete'])
    ->middleware('auth');

Route::get('/services/{service}/reviews/create', [ReviewController::class, 'create'])
    ->middleware('auth');

Route::post('/services/{service}/reviews', [ReviewController::class, 'store'])
    ->middleware('auth');

Route::get('/services/{service}/reviews', [ReviewController::class, 'index'])
    ->middleware('auth');

Route::get('/my-skills', [SkillController::class, 'index'])
    ->middleware('auth');

Route::post('/my-skills/add', [SkillController::class, 'add'])
    ->middleware('auth');

Route::delete('/my-skills/{skill}', [SkillController::class, 'remove'])
    ->middleware('auth');

Route::put('/my-skills/sync', [SkillController::class, 'sync'])
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
