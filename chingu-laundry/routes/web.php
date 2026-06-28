<?php
use App\Models\Service;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminMembershipController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman Landing Page (In Rainbow Laundry)
Route::get('/', function () {
    // 1. Ambil semua data layanan dari database
    $services = Service::all();
    
    // 2. Lempar data $services itu ke halaman welcome_laundry pakai compact
    return view('welcome_laundry', compact('services'));
})->name('home');

// 2. INI RUTE DASHBOARD ADMIN (YANG BARU KITA BIKIN)
Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])
    ->name('dashboard.index')
    ->middleware('auth');
// Pastikan ada ->name('admin.membership') 
Route::get('/dashboard-admin/membership', [AdminMembershipController::class, 'index'])->name('admin.membership');
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
// Rute khusus buat form navbar (Ambil Baju Bersih)
Route::post('/reservasi/ambil-bersih', [App\Http\Controllers\CustomerController::class, 'storeAmbilBersih'])->name('reservasi.ambil_bersih');
Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
Route::put('/transaksi/update-berat/{id}', [App\Http\Controllers\CustomerController::class, 'updateBerat'])->name('transaksi.update_berat');
// Route buat Export Data Pelanggan
Route::get('/pelanggan/export/pdf', [\App\Http\Controllers\CustomerController::class, 'exportPdf'])->name('pelanggan.pdf');
Route::get('/pelanggan/export/excel', [\App\Http\Controllers\CustomerController::class, 'exportExcel'])->name('pelanggan.excel');

// Transaksi
Route::get('/transaksi', [CustomerController::class, 'indexTransaksi'])->name('transaksi.index');
// Rute buat nampilin form kasir offline
Route::get('/transaksi/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('transaksi.create');
// Rute buat nyimpen data dari form kasir
Route::post('/transaksi/store-manual', [App\Http\Controllers\CustomerController::class, 'storeManual'])->name('transaksi.store_manual');
Route::get('/transaksi/export-pdf', [App\Http\Controllers\CustomerController::class, 'exportPdfTransaksi'])->name('transaksi.pdf');
Route::get('/transaksi/export-excel', [App\Http\Controllers\CustomerController::class, 'exportExcelTransaksi'])->name('transaksi.excel');
Route::put('/transaksi/{id}/status', [CustomerController::class, 'updateStatus'])->name('transaksi.updateStatus');
Route::get('/transaksi/{id}', [CustomerController::class, 'showTransaksi'])->name('transaksi.show');
Route::put('/transaksi/pembayaran/{id}', [App\Http\Controllers\CustomerController::class, 'updatePembayaran'])->name('transaksi.update_pembayaran');
// Syarat & Ketentuan
Route::get('/syarat-ketentuan', function () {
    return view('syarat_ketentuan');
})->name('syarat.ketentuan');

// Membership
Route::post('/membership/store', [MembershipController::class, 'store'])->name('membership.store');
Route::post('/membership/login', [MembershipController::class, 'login'])->name('membership.login');
Route::post('/membership/logout', [MembershipController::class, 'logout'])->name('membership.logout');
Route::post('/membership/perpanjang', [MembershipController::class, 'perpanjang'])->name('membership.perpanjang');
// Route buat Export Laporan Membership
Route::get('/membership/export/pdf', [\App\Http\Controllers\MembershipController::class, 'exportPdf'])->name('membership.pdf');
Route::get('/membership/export/excel', [\App\Http\Controllers\MembershipController::class, 'exportExcel'])->name('membership.excel');

// Halaman Cek Status
Route::get('/cek-status', [\App\Http\Controllers\CustomerController::class, 'halamanCekStatus'])->name('cek-status.index');

// Proses Pencarian/Tracking
Route::post('/cek-status/lacak', [\App\Http\Controllers\CustomerController::class, 'lacakStatus'])->name('cek-status.lacak');
//proses cetak invoice
Route::get('/transaksi/{id}/cetak', [CustomerController::class, 'cetakInvoice'])->name('transaksi.cetak');
//payment dummy
Route::get('/pembayaran-membership/{id}', [PaymentController::class, 'show'])->name('dummy.bayar');
Route::post('/pembayaran-membership/{id}/proses', [PaymentController::class, 'process'])->name('dummy.proses');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
