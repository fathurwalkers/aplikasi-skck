<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\HomeController;

// Misc Route
Route::get('/login', [BackController::class, 'login'])->name('login');
Route::post('/login', [BackController::class, 'postLogin'])->name('post-login');
Route::get('/register', [BackController::class, 'register'])->name('register');
Route::post('/register', [BackController::class, 'postRegister'])->name('post-register');

// Home Route
Route::group(['prefix' => '/'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/petunjuk', [HomeController::class, 'petunjuk'])->name('petunjuk');
});

// Dashboard Route
Route::group(['prefix' =>'/dashboard'], function () {
    Route::get('/', [BackController::class, 'index'])->name('dashboard');
    Route::get('/profile', [BackController::class, 'profile'])->name('profile');

    // SKCK Route
    Route::get('/daftar-skck', [BackController::class, 'daftar_skck'])->name('daftar-skck');
    Route::get('/edit-skck', [BackController::class, 'edit_skck'])->name('edit-skck');

    // Print Route
    Route::get('/print-skck-baru', [BackController::class, 'print_baru'])->name('print-skck-baru');
    Route::get('/print-skck-perpanjang', [BackController::class, 'print_perpanjang'])->name('print-skck-perpanjang');
});
