<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;

Route::get('/dashboard', [BackController::class, 'index'])->name('beranda');
