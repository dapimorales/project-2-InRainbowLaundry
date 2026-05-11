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
    //subtotal harga
    $layanan = \App\Models\Service::find($request->service_id);
    $harga = $layanan ? $layanan->harga : 0; // Kalo ketemu ambil harganya, kalo nggak 0
    $qty_awal = 1; // Default awal diset 1 dulu pas pickup
    $subtotal_awal = $harga * $qty_awal;

    // 3. Simpan ke tabel orders
    $order = \App\Models\Order::create([
        'kode_invoice' => $kodeInvoice,
        'customer_id'  => $customer->id, 
        'tgl_masuk'    => $waktuLengkap, // Sekarang sudah bisa masuk sekaligus jamnya
        'tgl_selesai'  => null,
        'total_harga'  => $subtotal_awal, 
        'status_order' => 'baru',  // Pakai 'baru' sesuai ENUM di DB
        'status_bayar' => 'belum', // Pakai 'belum' sesuai ENUM di DB
    ]);

    // 4. Simpan ke tabel order_details
    \App\Models\OrderDetail::create([
        'order_id'   => $order->id,
        'service_id' => $request->service_id,
        'qty'        => 1,
        'subtotal'   => $subtotal_awal,
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
public function showTransaksi($id)
{
    // Ambil order berdasarkan ID, sekalian bawa data customer dan rincian layanannya
    $order = \App\Models\Order::with(['customer', 'orderDetails.service'])->findOrFail($id);
    
    return view('transaksi.show', compact('order'));
}
public function updateStatus(Request $request, $id)
{
    // 1. Validasi (pastiin status yang dikirim sesuai ENUM di DB)
    $request->validate([
        'status_order' => 'required|in:baru,proses,selesai,diambil'
    ]);

    // 2. Cari ordernya
    $order = \App\Models\Order::findOrFail($id);

    // 3. Update statusnya
    $order->status_order = $request->status_order;

    // Logika tambahan: Kalo statusnya 'selesai', isi tgl_selesai otomatis
    if ($request->status_order == 'selesai') {
        $order->tgl_selesai = now(); 
    }

    $order->save();

    // 4. Balik lagi ke halaman detail dengan pesan sukses
    return redirect()->back()->with('success', 'Status order berhasil diupdate, Masbro!');
}
// Nampilin halaman awal form lacak
    public function halamanCekStatus()
    {
        return view('cek_status'); // Sesuaikan sama nama file blade lu
    }

    // Proses pencarian data pesanan dan membership
    public function lacakStatus(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'invoice' => 'required'
        ]);

        // 1. Cari data pesanan berdasarkan No Faktur (beserta data customernya)
        $order = \App\Models\Order::with(['customer', 'orderDetails.service'])
                    ->where('kode_invoice', $request->invoice)
                    ->first();

        $membership = null; // Default kosongin dulu

        // 2. Kalau pesanannya ketemu, kita cek nomor HP-nya di tabel membership!
        if ($order && $order->customer) {
            $membership = \App\Models\Membership::where('nomor_whatsapp', $order->customer->no_hp)->first();
        }

        // Lempar datanya kembali ke halaman cek_status
        return view('cek_status', compact('order', 'membership'))->with('searched', true);
    }
}
