<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;

Route::get('/login', [BackController::class, 'login'])->name('login');
Route::post('/login', [BackController::class, 'postLogin'])->name('post-login');
Route::get('/register', [BackController::class, 'register'])->name('register');
Route::post('/register', [BackController::class, 'postRegister'])->name('post-register');

Route::group(['prefix' =>'/dashboard'], function () {
    Route::get('/', [BackController::class, 'index'])->name('dashboard');
    Route::get('/profile', [BackController::class, 'profile'])->name('profile');
});
