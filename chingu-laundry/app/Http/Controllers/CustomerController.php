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
    // 1. Validasi (Tambahin qty di sini biar wajib diisi)
    $request->validate([
        'nama'       => 'required',
        'no_hp'      => 'required', 
        'alamat'     => 'required',
        'service_id' => 'required',
        'qty'        => 'required|numeric|min:1', // INI TAMBAHANNYA
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
    
    // --- START PERUBAHAN HITUNG-HITUNGAN MASBRO ---
    $layanan = \App\Models\Service::find($request->service_id);
    $harga = $layanan ? $layanan->harga : 0; 
    
    // Ambil angka qty dari form yang diketik pelanggan!
    $qty_input = $request->qty; 
    
    // Rumus sakti: Harga dikali Qty dari form
    $total_harga_asli = $harga * $qty_input;
    // --- END PERUBAHAN ---

    // 3. Simpan ke tabel orders
    $order = \App\Models\Order::create([
        'kode_invoice' => $kodeInvoice,
        'customer_id'  => $customer->id, 
        'tgl_masuk'    => $waktuLengkap, 
        'tgl_selesai'  => null,
        'total_harga'  => $total_harga_asli, // Pake hasil perkalian yang baru
        'status_order' => 'baru',  
        'status_bayar' => 'belum', 
    ]);

    // 4. Simpan ke tabel order_details
    \App\Models\OrderDetail::create([
        'order_id'   => $order->id,
        'service_id' => $request->service_id,
        'qty'        => $qty_input, // Simpan qty yang asli ke database
        'subtotal'   => $total_harga_asli, // Simpan subtotalnya
    ]);

    return redirect()->back()->with('success', 'Tunggu ya masbro, kurir kami segera meluncur!');
}
public function show($id)
{
    $customer = Customer::with('orders')->findOrFail($id);
    return view('customers.show', compact('customer'));
}
public function cetakInvoice($id)
{
    // Ambil data order, sekalian narik data customer dan detail layanannya
    $order = \App\Models\Order::with(['customer', 'orderDetails.service'])->findOrFail($id);
    
    // UBAH DI SINI: Tambahin 'transaksi.' di depan nama file
    return view('transaksi.cetak_invoice', compact('order'));
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
