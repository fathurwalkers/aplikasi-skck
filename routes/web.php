<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;

Route::get('/login', [BackController::class, 'login'])->name('login');
Route::post('/login', [BackController::class, 'postLogin'])->name('post-login');
Route::get('/register', [BackController::class, 'register'])->name('register');
Route::post('/register', [BackController::class, 'postRegister'])->name('post-register');

Route::get('/dashboard', [BackController::class, 'index'])->name('beranda');
