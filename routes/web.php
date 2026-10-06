<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\AdminController;

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

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->middleware(['auth', 'role:admin']);

Route::get('/admin/users', [AdminController::class, 'users'])
    ->middleware(['auth', 'role:admin']);

Route::get('/admin/categories', [AdminController::class, 'categories'])
    ->middleware(['auth', 'role:admin']);

Route::get('/admin/services', [AdminController::class, 'services'])
    ->middleware(['auth', 'role:admin']);

Route::get('/admin/reviews', [AdminController::class, 'reviews'])
    ->middleware(['auth', 'role:admin']);

Route::delete('/admin/users/{user}', [AdminController::class, 'deleteUser'])
    ->middleware(['auth', 'role:admin']);

Route::delete('/admin/categories/{category}', [AdminController::class, 'deleteCategory'])
    ->middleware(['auth', 'role:admin']);

Route::delete('/admin/services/{service}', [AdminController::class, 'deleteService'])
    ->middleware(['auth', 'role:admin']);

Route::delete('/admin/reviews/{review}', [AdminController::class, 'deleteReview'])
    ->middleware(['auth', 'role:admin']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
