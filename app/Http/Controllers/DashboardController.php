<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Panggil model yang dibutuhin
use App\Models\Order;
use App\Models\Customer;
use App\Models\Membership;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung-hitungan otomatis
        $totalPesanan = Order::count(); // Total semua pesanan/cucian
        $totalPelanggan = Customer::count(); // Total semua pelanggan
        $memberAktif = Membership::where('status', 'aktif')->count(); // Total member yang masih aktif
        
        // --- PERHITUNGAN TOTAL PENDAPATAN KESELURUHAN ---
        // 1. Duit dari daftar Membership
        $pendapatanMember = Membership::where('status', 'aktif')->sum('harga');
        
        // 2. Duit dari transaksi Cucian (Cuma ngitung yang status bayarnya udah 'lunas')
        $pendapatanCucian = Order::where('status_bayar', 'lunas')->sum('total_harga');
        
        // 3. Gabungin duit member dan duit cucian
        $pendapatanLaundry = $pendapatanMember + $pendapatanCucian;
        
        // Ambil 5 transaksi terbaru, diurutin dari yang paling baru masuk (latest)
        $transaksiTerbaru = Order::with('customer')->latest()->take(5)->get();
        
        return view('dashboard.index', compact(
            'totalPesanan', 
            'totalPelanggan', 
            'memberAktif', 
            'pendapatanLaundry',
            'transaksiTerbaru'
        ));
    }
}