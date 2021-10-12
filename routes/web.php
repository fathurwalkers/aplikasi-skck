<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\HomeController;

// Misc Route
Route::post('/logout', [BackController::class, 'logout'])->name('logout');
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
Route::group(['prefix' =>'/dashboard', 'middleware' => 'ceklogin'], function () {
    Route::get('/', [BackController::class, 'index'])->name('dashboard');
    Route::get('/profile', [BackController::class, 'profile'])->name('profile');

    // SKCK Route
    Route::get('/daftar-skck', [BackController::class, 'daftar_skck'])->name('daftar-skck');
    Route::get('/verifikasi-pengguna', [BackController::class, 'verifikasi_pengguna'])->name('verifikasi-pengguna');
    Route::post('/verifikasi-pengguna/post', [BackController::class, 'post_verifikasi_pengguna'])->name('post-verifikasi-pengguna');
    Route::get('/tambah-skck', [BackController::class, 'tambah_skck'])->name('tambah-skck');
    Route::post('/tambah-skck/post', [BackController::class, 'post_tambah_skck'])->name('post-tambah-skck');
    Route::get('/perpanjangan-skck', [BackController::class, 'perpanjangan_skck'])->name('perpanjangan-skck');
    Route::post('/batalkan/post', [BackController::class, 'batalkan'])->name('batalkan');
    Route::get('/edit-skck', [BackController::class, 'edit_skck'])->name('edit-skck');
    Route::post('/hapus/{id}', [BackController::class, 'hapus_skck'])->name('hapus-skck');

    // Laporan Route
    Route::get('/buat-laporan', [BackController::class, 'buat_laporan'])->name('buat-laporan');
    Route::post('/buat-laporan/post', [BackController::class, 'post_buat_laporan'])->name('post-buat-laporan');
    Route::get('/laporan-masuk', [BackController::class, 'laporan_masuk'])->name('laporan-masuk');

    // Print Route
    Route::post('/print-skck-baru', [BackController::class, 'print_baru'])->name('print-skck-baru');
    Route::get('/print-skck-perpanjang', [BackController::class, 'print_perpanjang'])->name('print-skck-perpanjang');
});
