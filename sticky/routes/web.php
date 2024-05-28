<?php

use App\Http\Controllers;
use App\Http\Middleware\HasRoleAdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', Controllers\HomeController::class)->name('home');

Route::get('/dashboard', Controllers\DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');
// Route::resource('stores', Controllers\StoreController::class);
Route::get('stores', [Controllers\StoreController::class, 'index'])->name('stores.index');

// Route::get('stores/list', [Controllers\StoreController::class, 'list'])->name('stores.list')->middleware('role:admin');
// Route::get('stores/list', [Controllers\StoreController::class, 'list'])->name('stores.list')->middleware(HasRoleAdminMiddleware::class);


Route::middleware('auth')->group(function () {
    // Route::resource('stores', Controllers\StoreController::class)->except('index');

    Route::middleware(HasRoleAdminMiddleware::class)->group(function () {
        Route::get('stores/list', [Controllers\StoreController::class, 'list'])->name('stores.list');
    });

    Route::middleware('verified')->group(function () {
        Route::resource('stores', Controllers\StoreController::class)->except('index');
    });

    Route::get('/profile', [Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::resource('stores', Controllers\StoreController::class)->except('index');
// });

require __DIR__ . '/auth.php';
