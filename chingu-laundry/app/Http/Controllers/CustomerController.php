<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Order;

class CustomerController extends Controller
{
   public function index()
    {
        // Ambil semua data customer
        $customers = Customer::latest()->get();
        
        return view('customers.index', compact('customers'));
    }
    public function indexTransaksi()
    {
        // Ambil data order, urutkan dari yang terbaru, 
        // dan bawa relasi 'customer'-nya biar nama pelanggan muncul
        $orders = Order::with('customer')->latest()->get();
        
        // Arahkan ke folder transaksi file index.blade.php
        return view('transaksi.index', compact('orders'));
    }
    public function storeReservasi(\Illuminate\Http\Request $request)
{
    // 1. Validasi
    $request->validate([
        'nama'       => 'required',
        'no_hp'      => 'required', 
        'alamat'     => 'required',
        'service_id' => 'required',
        'tgl_jemput' => 'required',
        'jam_jemput' => 'required',
    ]);

    // 2. Simpan ke tabel customers (firstOrCreate biar gak duplikat)
    $customer = \App\Models\Customer::firstOrCreate(
        ['no_hp' => $request->no_hp],
        [
            'nama'   => $request->nama,
            'alamat' => $request->alamat,
        ]
    );

    // Bikin kode invoice unik
    $kodeInvoice = 'INV-' . date('Ymd') . '-' . strtoupper(\Illuminate\Support\Str::random(5));

    // GABUNGKAN Tanggal dan Jam (Format SQL: YYYY-MM-DD HH:MM:SS)
    $waktuLengkap = $request->tgl_jemput . ' ' . $request->jam_jemput . ':00';

    // 3. Simpan ke tabel orders
    $order = \App\Models\Order::create([
        'kode_invoice' => $kodeInvoice,
        'customer_id'  => $customer->id, 
        'tgl_masuk'    => $waktuLengkap, // Sekarang sudah bisa masuk sekaligus jamnya
        'tgl_selesai'  => null,
        'total_harga'  => 0, 
        'status_order' => 'baru',  // Pakai 'baru' sesuai ENUM di DB
        'status_bayar' => 'belum', // Pakai 'belum' sesuai ENUM di DB
    ]);

    // 4. Simpan ke tabel order_details
    \App\Models\OrderDetail::create([
        'order_id'   => $order->id,
        'service_id' => $request->service_id,
        'qty'        => 1,
        'subtotal'   => 0,
    ]);

    return redirect()->back()->with('success', 'Tunggu ya masbro, kurir kami segera meluncur!');
}
public function show($id)
{
    $customer = Customer::with('orders')->findOrFail($id);
    return view('customers.show', compact('customer'));
}

// Menghapus data pelanggan
public function destroy($id)
{
    $customer = Customer::findOrFail($id);
    $customer->delete();

    return redirect()->route('customers.index')->with('success', 'Data pelanggan berhasil dihapus, Masbro!');
}
}
