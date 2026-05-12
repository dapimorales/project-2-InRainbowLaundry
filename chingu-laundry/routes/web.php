<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MembershipController;

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
Route::get('/layanan', [ServiceController::class, 'index'])->name('layanan.index');
Route::post('/layanan', [ServiceController::class, 'store'])->name('layanan.store');
Route::get('/layanan/tambah', [ServiceController::class, 'create'])->name('layanan.create');
Route::get('/layanan/{id}/edit', [ServiceController::class, 'edit'])->name('layanan.edit');
Route::put('/layanan/{id}', [ServiceController::class, 'update'])->name('layanan.update');
Route::delete('/layanan/{id}', [ServiceController::class, 'destroy'])->name('layanan.destroy');

// Customers
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::post('/reservasi', [CustomerController::class, 'storeReservasi'])->name('reservasi.store');
Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');

// Transaksi
Route::get('/transaksi', [CustomerController::class, 'indexTransaksi'])->name('transaksi.index');
Route::put('/transaksi/{id}/status', [CustomerController::class, 'updateStatus'])->name('transaksi.updateStatus');
Route::get('/transaksi/{id}', [CustomerController::class, 'showTransaksi'])->name('transaksi.show');

// Syarat & Ketentuan
Route::get('/syarat-ketentuan', function () {
    return view('syarat_ketentuan');
})->name('syarat.ketentuan');

// Membership
Route::post('/membership/store', [MembershipController::class, 'store'])->name('membership.store');
Route::post('/membership/login', [MembershipController::class, 'login'])->name('membership.login');
Route::post('/membership/logout', [MembershipController::class, 'logout'])->name('membership.logout');
Route::post('/membership/perpanjang', [MembershipController::class, 'perpanjang'])->name('membership.perpanjang');

// Halaman Cek Status
Route::get('/cek-status', [\App\Http\Controllers\CustomerController::class, 'halamanCekStatus'])->name('cek-status.index');

// Proses Pencarian/Tracking
Route::post('/cek-status/lacak', [\App\Http\Controllers\CustomerController::class, 'lacakStatus'])->name('cek-status.lacak');