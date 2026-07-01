<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Membership;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\MembershipExport;

class MembershipController extends Controller
{
    // =====================
    // DAFTAR MEMBERSHIP
    // =====================
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'alamat_lengkap' => 'required|string',
            'kota'           => 'required|string|max:100',
            'kode_pos'       => 'required|string|max:10',
            'email'          => 'required|email|unique:memberships,email',
            'password'       => 'required|string|min:1',
            'nomor_whatsapp' => 'required|string|max:20',
            'tanggal_lahir'  => 'required|date',
            'paket_dipilih'  => 'required|in:silver,gold,platinum',
            'setuju'         => 'accepted',
        ], [
            'email.unique'    => 'Email ini sudah terdaftar sebagai member.',
            'setuju.accepted' => 'Anda harus menyetujui syarat dan ketentuan.',
        ]);

        $paketInfo = [
            'silver'   => ['harga' => 300000, 'bonus_saldo' => 20000,  'label' => 'Paket Silver'],
            'gold'     => ['harga' => 500000, 'bonus_saldo' => 50000,  'label' => 'Paket Gold'],
            'platinum' => ['harga' => 900000, 'bonus_saldo' => 100000, 'label' => 'Paket Platinum'],
        ];

        $paket = $paketInfo[$request->paket_dipilih];

        // TANGKAP DATANYA KE VARIABEL $member & UBAH STATUS JADI PENDING
        $member = Membership::create([
            'nama_lengkap'   => $request->nama_lengkap,
            'alamat_lengkap' => $request->alamat_lengkap,
            'kota'           => $request->kota,
            'kode_pos'       => $request->kode_pos,
            'email'          => $request->email,
            'password'       => Hash::make($request->password),
            'nomor_whatsapp' => $request->nomor_whatsapp,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'paket'          => $request->paket_dipilih,
            'harga'          => $paket['harga'],
            'bonus_saldo'    => $paket['bonus_saldo'],
            'saldo'          => $paket['bonus_saldo'],
            'tgl_mulai'      => Carbon::today(),
            'tgl_expired'    => Carbon::today()->addMonth(),
            'status'         => 'pending', // <--- INI UDAH JADI PENDING
        ]);

        // REDIRECT LANGSUNG KE HALAMAN DUMMY PAYMENT (BLOK WA UDAH DIHAPUS)
        return redirect()->route('dummy.bayar', $member->id);
    }

    // =====================
    // LOGIN MEMBER
    // =====================
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $member = Membership::where('email', $request->email)->first();

        if (!$member || !Hash::check($request->password, $member->password)) {
            return back()->with('login_error', 'Email atau password salah.');
        }

        // Cek kalau sudah expired, update status
        if ($member->sudahExpired()) {
            $member->update(['status' => 'nonaktif']);
        }

        Session::put('member_id', $member->id);

        return redirect()->route('syarat.ketentuan')->with('login_success', true);
    }

    // =====================
    // LOGOUT MEMBER
    // =====================
    public function logout()
    {
        Session::forget(['member_id']);
        return redirect()->route('syarat.ketentuan');
    }

    // =====================
    // PERPANJANG MEMBERSHIP
    // =====================
    public function perpanjang(Request $request)
    {
        $memberId = Session::get('member_id');
        if (!$memberId) {
            return redirect()->route('syarat.ketentuan');
        }

        $member = Membership::findOrFail($memberId);

        $request->validate([
            'paket_baru' => 'required|in:silver,gold,platinum',
        ]);

        $paketInfo = [
            'silver'   => ['harga' => 300000, 'bonus_saldo' => 20000,  'label' => 'Paket Silver'],
            'gold'     => ['harga' => 500000, 'bonus_saldo' => 50000,  'label' => 'Paket Gold'],
            'platinum' => ['harga' => 900000, 'bonus_saldo' => 100000, 'label' => 'Paket Platinum'],
        ];

        $paket     = $paketInfo[$request->paket_baru];
        $mulaiDari = $member->sudahExpired() ? Carbon::today() : Carbon::parse($member->tgl_expired);

        $member->update([
            'paket'       => $request->paket_baru,
            'harga'       => $paket['harga'],
            'bonus_saldo' => $paket['bonus_saldo'],
            'saldo'       => $member->saldo + $paket['bonus_saldo'],
            'tgl_mulai'   => $mulaiDari,
            'tgl_expired' => $mulaiDari->copy()->addMonth(),
            'status'      => 'aktif',
        ]);

        // Redirect ke WhatsApp admin untuk konfirmasi perpanjangan
        $noAdmin  = '6285710465321';
        $pesanWA  = "Halo Admin Dapi Laundry! 🧺\n\n";
        $pesanWA .= "Saya *" . $member->nama_lengkap . "* mau perpanjang Membership *" . $paket['label'] . "*.\n\n";
        $pesanWA .= "Total Tagihan: *Rp " . number_format($paket['harga'], 0, ',', '.') . "*\n\n";
        $pesanWA .= "Saya mau konfirmasi pembayaran nih, untuk transfernya ke rekening mana ya?";

        $linkWhatsApp = "https://api.whatsapp.com/send?phone=" . $noAdmin . "&text=" . urlencode($pesanWA);

        return redirect()->away($linkWhatsApp);
    }
    // FUNGSI BUAT CETAK EXCEL
    public function exportExcel()
    {
        return Excel::download(new MembershipExport, 'Data_Membership_DapiLaundry.xlsx');
    }

    // FUNGSI BUAT CETAK PDF
    public function exportPdf()
    {
        // 1. Ambil semua data membership buat di-looping di dalam tabel PDF
        $memberships = Membership::all();
        
        // 2. HITUNG TOTAL MEMBER AKTIF
        // Menghitung jumlah baris yang kolom statusnya berisi tulisan 'aktif'
        $totalMember = Membership::where('status', 'aktif')->count();
        
        // 3. HITUNG TOTAL PENDAPATAN REAL-TIME
        // Menjumlahkan semua nominal di kolom 'harga' hanya dari member yang statusnya 'aktif' (sudah bayar)
        $totalPendapatan = Membership::where('status', 'aktif')->sum('harga');
        
        // 4. Lempar data memberships, totalMember, dan totalPendapatan ke tampilan PDF
        $pdf = Pdf::loadView('membership.pdf_view', compact('memberships', 'totalMember', 'totalPendapatan'));
        
        return $pdf->download('Data_Membership_DapiLaundry.pdf');
    }
}