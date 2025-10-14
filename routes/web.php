<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\CatalogController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Profile\SecurityController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

// Landing Pages Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog');
Route::get('/tentang-kami', [AboutController::class, 'index'])->name('about');
Route::get('/kontak', [ContactController::class, 'index'])->name('contact');
Route::post('/kontak/send', [ContactController::class, 'send'])->name('contact.send');

Route::prefix('dashboard')->middleware(['auth'])->group(function () {

    // Dashboard Route
    Route::middleware(['role:admin, staff'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    });

    // User Route
    Route::name('dashboard.')->group(function () {
        Route::patch('/users/{user}/reset-password', [UserController::class, 'resetPassword'])->name('user.reset-password');
        Route::resource('user', UserController::class)->middleware(['role:admin']);
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profile/security', [SecurityController::class, 'index'])->name('profile.security');
});
