<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController; // Pindahin ke atas biar rapi
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman Landing Page (In Rainbow Laundry)
Route::get('/', function () {
    return view('welcome_laundry');
})->name('home');

// Halaman Daftar Layanan (Dashboard Admin)
// Akses di: localhost:8000/layanan
Route::get('/layanan', [ServiceController::class, 'index'])->name('layanan.index');

// Route untuk Proses Simpan Data (Buat fitur nambah layanan nanti)
Route::post('/layanan', [ServiceController::class, 'store'])->name('layanan.store');
// Route buat nampilin form tambah
Route::get('/layanan/tambah', [ServiceController::class, 'create'])->name('layanan.create');
Route::get('/layanan/{id}/edit', [ServiceController::class, 'edit'])->name('layanan.edit');
Route::put('/layanan/{id}', [ServiceController::class, 'update'])->name('layanan.update');
Route::delete('/layanan/{id}', [ServiceController::class, 'destroy'])->name('layanan.destroy');
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::post('/reservasi', [CustomerController::class, 'storeReservasi'])->name('reservasi.store');
Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');