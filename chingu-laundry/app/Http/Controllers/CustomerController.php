<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Order;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\CustomerExport;

class CustomerController extends Controller
{
   public function index()
    {
        // Ambil semua data customer
        $customers = Customer::latest()->get();
        
        return view('customers.index', compact('customers'));
    }
    public function indexTransaksi(Request $request)
    {
     $query = \App\Models\Order::with('customer')->latest();

    // Pakai 'when' biar kalau $request->tipe kosong, dia nampilin semua
    $query->when($request->tipe, function ($q) use ($request) {
        return $q->where('tipe_pesanan', $request->tipe);
    });

    $orders = $query->get();
    
    return view('transaksi.index', compact('orders'));
    }
   public function storeReservasi(\Illuminate\Http\Request $request)
    {
        // 1. Validasi (qty DIHAPUS biar ga error pas form disubmit)
        $request->validate([
            'nama'       => 'required',
            'no_hp'      => 'required', 
            'alamat'     => 'required',
            'service_id' => 'required',
            'tgl_jemput' => 'required',
            'jam_jemput' => 'required',
        ]);

        // 2. Simpan ke tabel customers
        $customer = \App\Models\Customer::firstOrCreate(
            ['no_hp' => $request->no_hp],
            [
                'nama'   => $request->nama,
                'alamat' => $request->alamat,
            ]
        );

        $kodeInvoice = 'INV-' . date('Ymd') . '-' . strtoupper(\Illuminate\Support\Str::random(5));
        $waktuLengkap = $request->tgl_jemput . ' ' . $request->jam_jemput . ':00';
        
        // --- START PERUBAHAN: Set default 0 karena belum ditimbang ---
        $qty_input = 0; 
        $total_harga_asli = 0;
        // --- END PERUBAHAN ---

        // 3. Simpan ke tabel orders
        $order = \App\Models\Order::create([
            'kode_invoice' => $kodeInvoice,
            'customer_id'  => $customer->id, 
            'tgl_masuk'    => $waktuLengkap, 
            'tgl_selesai'  => null,
            'total_harga'  => $total_harga_asli, // Masuk ke DB nilainya 0
            'status_order' => 'baru',  
            'status_bayar' => 'belum', 
            'tipe_pesanan' => 'online', // 👇👇 INI TAMBAHANNYA BIAR FILTER JALAN 👇👇
        ]);

        // 4. Simpan ke tabel order_details
        \App\Models\OrderDetail::create([
            'order_id'   => $order->id,
            'service_id' => $request->service_id,
            'qty'        => $qty_input, // Masuk ke DB nilainya 0
            'subtotal'   => $total_harga_asli, // Masuk ke DB nilainya 0
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
        // $order->tgl_selesai = now(); 
    }

    $order->save();

    // 4. Balik lagi ke halaman detail dengan pesan sukses
    return redirect()->back()->with('success', 'Status order berhasil diupdate, Masbro!');
}
// --- FUNGSI UPDATE BERAT & HITUNG OTOMATIS HARGA ---
    public function updateBerat(Request $request, $id)
    {
        $request->validate([
            'qty' => 'required|numeric|min:1'
        ]);

        // Cari order dan rincian layanannya
        $order = \App\Models\Order::findOrFail($id);
        $detail = \App\Models\OrderDetail::with('service')->where('order_id', $id)->first();

        if ($detail && $detail->service) {
            // Tarik harga asli dari master layanan
            $harga_satuan = $detail->service->harga;
            $qty_baru = $request->qty;
            
            // Rumus: Harga x Qty Baru
            $total_baru = $harga_satuan * $qty_baru;

            // Simpan ke order_detail
            $detail->qty = $qty_baru;
            $detail->subtotal = $total_baru;
            $detail->save();

            // Simpan ke tabel orders utama
            $order->total_harga = $total_baru;
            $order->save();
        }

        return redirect()->back()->with('success', 'Mantap! Berat cucian dan tagihan sukses diupdate.');
    }

// Update Status Pembayaran
public function updatePembayaran(Request $request, $id)
{
    // 1. Validasi inputan (cuma boleh 'belum' atau 'lunas')
    $request->validate([
        'status_bayar' => 'required|in:belum,lunas'
    ]);

    // 2. Cari ordernya
    $order = \App\Models\Order::findOrFail($id);

    // 3. Update status bayarnya
    $order->status_bayar = $request->status_bayar;
    $order->save();

    // 4. Balikin ke halaman detail dengan alert sukses
    return redirect()->back()->with('success', 'Mantap! Status pembayaran berhasil diupdate.');
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
    // FUNGSI EXCEL PELANGGAN
    public function exportExcel()
    {
        return Excel::download(new CustomerExport, 'Data_Pelanggan_DapiLaundry.xlsx');
    }

    // FUNGSI PDF PELANGGAN
    public function exportPdf()
    {
        $customers = \App\Models\Customer::all();
        $totalCustomer = $customers->count();
        
        $pdf = Pdf::loadView('customers.pdf_view', compact('customers', 'totalCustomer'));
        return $pdf->download('Data_Pelanggan_DapiLaundry.pdf');
    }
    // --- FUNGSI KHUSUS FORM NAVBAR (JANJI AMBIL/ANTAR BAJU BERSIH) ---
    public function storeAmbilBersih(\Illuminate\Http\Request $request)
    {
        // 1. Validasi form navbar (Sama persis kayak form bawah, tapi tanpa qty)
        $request->validate([
            'nama'       => 'required',
            'no_hp'      => 'required',
            'tgl_jemput' => 'required',
            'jam_jemput' => 'required',
        ]);

        // 2. Cari data pelanggan di database berdasarkan Nomor WA
        $customer = \App\Models\Customer::where('no_hp', $request->no_hp)->first();

        // Kalau WA-nya nggak pernah terdaftar
        if (!$customer) {
            return redirect()->back()->with('error', 'Waduh, nomor WA tidak ditemukan. Pastikan nomornya sama dengan saat menaruh cucian ya!');
        }

        // 3. Cari orderan milik pelanggan ini yang statusnya UDAH SELESAI
        $order = \App\Models\Order::where('customer_id', $customer->id)
                                  ->where('status_order', 'selesai')
                                  ->latest()
                                  ->first();

        // Kalau cuciannya belum ada yang selesai / masih diproses
        if (!$order) {
            return redirect()->back()->with('error', 'Maaf, belum ada cucian atas nomormu yang berstatus Selesai. Silakan cek status cucianmu dulu ya!');
        }

        // Kalau cuciannya belum ada yang selesai / masih diproses
        if (!$order) {
            return redirect()->back()->with('error', 'Maaf, belum ada cucian atas nomormu yang berstatus Selesai. Silakan cek status cucianmu dulu ya!');
        }

        // 4. SIMPAN JADWAL KE DATABASE (INI YANG BARU)
        $order->rencana_ambil = $request->tgl_jemput . ' ' . $request->jam_jemput . ':00';
        $order->save();

        return redirect()->back()->with('success', 'Sip mantap! Baju bersihmu akan kami siapkan sesuai jadwal: ' . $request->tgl_jemput . ' jam ' . $request->jam_jemput);
    }
    // --- FITUR KASIR OFFLINE (DI TOKO) ---
    public function create()
    {
        // Narik data layanan biar kasir bisa milih di dropdown
        $services = \App\Models\Service::all();
        return view('transaksi.create', compact('services'));
    }

    public function storeManual(Request $request)
    {
        $request->validate([
            'nama'              => 'required',
            'no_hp'             => 'required',
            'alamat'            => 'required',
            'service_id'        => 'required',
            'qty'               => 'required|numeric|min:1',
            'tgl_selesai'       => 'required|date',
            'status_bayar'      => 'required|in:belum,lunas',
            'metode_pembayaran' => 'nullable|string'
        ]);

        // 1. Cari atau Bikin Data Pelanggan Baru
        $customer = \App\Models\Customer::firstOrCreate(
            ['no_hp' => $request->no_hp],
            [
                'nama'   => $request->nama,
                'alamat' => $request->alamat,
            ]
        );

        // 2. Tarik Harga Layanan buat Dikalikan sama Berat
        $service = \App\Models\Service::findOrFail($request->service_id);
        $total_harga = $service->harga * $request->qty;

        $kodeInvoice = 'INV-' . date('Ymd') . '-' . strtoupper(\Illuminate\Support\Str::random(5));

        // 3. Simpan ke tabel orders utama
        $order = \App\Models\Order::create([
            'kode_invoice'      => $kodeInvoice,
            'customer_id'       => $customer->id,
            'tgl_masuk'         => now(), // Waktu otomatis detik ini
            'tgl_selesai'       => $request->tgl_selesai,
            'total_harga'       => $total_harga,
            'status_order'      => 'baru', // Status awal masuk
            'status_bayar'      => $request->status_bayar,
            'metode_pembayaran' => $request->status_bayar == 'lunas' ? $request->metode_pembayaran : null,
        ]);

        // 4. Simpan ke tabel rincian order
        \App\Models\OrderDetail::create([
            'order_id'   => $order->id,
            'service_id' => $request->service_id,
            'qty'        => $request->qty,
            'subtotal'   => $total_harga,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Mantap! Transaksi kasir offline sukses dicatat.');
    }
    // --- FUNGSI EXCEL TRANSAKSI ---
    public function exportExcelTransaksi(Request $request)
    {
        $nama_file = 'laporan-transaksi-' . ($request->tipe ?: 'semua') . '.xlsx';
        
        // Pastikan lu udah bikin TransaksiExport di App\Exports\TransaksiExport
        return Excel::download(new \App\Exports\TransaksiExport($request->tipe), $nama_file);
    }

    // --- FUNGSI PDF TRANSAKSI ---
    public function exportPdfTransaksi(Request $request)
    {
        // 👇 UBAH DI SINI: Tambahin with('customer')
        $query = \App\Models\Order::with('customer');

        // Tangkap filternya biar PDF yang dicetak sesuai pilihan
        if ($request->has('tipe') && $request->tipe != '' && $request->tipe != 'semua') {
            $query->where('tipe_pesanan', $request->tipe);
        }

        $transaksi = $query->get();
        $nama_file = 'laporan-transaksi-' . ($request->tipe ?: 'semua') . '.pdf';

        $pdf = Pdf::loadView('transaksi.export', compact('transaksi'));
        
        return $pdf->download($nama_file);
    }
}