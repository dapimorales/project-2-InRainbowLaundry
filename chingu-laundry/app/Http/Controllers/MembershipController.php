<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input form
        $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'alamat_lengkap' => 'required|string',
            'kota'           => 'required|string|max:100',
            'kode_pos'       => 'required|string|max:10',
            'email'          => 'required|email|max:255',
            'nomor_whatsapp' => 'required|string|max:20',
            'tanggal_lahir'  => 'required|date',
            'paket_dipilih'  => 'required|in:silver,gold,platinum',
            'setuju'         => 'accepted',
        ], [
            'nama_lengkap.required'   => 'Nama lengkap wajib diisi.',
            'alamat_lengkap.required' => 'Alamat wajib diisi.',
            'kota.required'           => 'Kota wajib diisi.',
            'kode_pos.required'       => 'Kode pos wajib diisi.',
            'email.required'          => 'Email wajib diisi.',
            'email.email'             => 'Format email tidak valid.',
            'nomor_whatsapp.required' => 'Nomor WhatsApp wajib diisi.',
            'tanggal_lahir.required'  => 'Tanggal lahir wajib diisi.',
            'paket_dipilih.required'  => 'Paket wajib dipilih.',
            'setuju.accepted'         => 'Anda harus menyetujui syarat dan ketentuan.',
        ]);

        // Harga dan bonus saldo berdasarkan paket
        $paketInfo = [
            'silver'   => ['harga' => 300000, 'bonus_saldo' => 20000,  'label' => 'Paket Silver'],
            'gold'     => ['harga' => 500000, 'bonus_saldo' => 50000,  'label' => 'Paket Gold'],
            'platinum' => ['harga' => 900000, 'bonus_saldo' => 100000, 'label' => 'Paket Platinum'],
        ];

        $paket = $paketInfo[$request->paket_dipilih];

        // --- SIMPAN KE DATABASE 
        \App\Models\Membership::create([
            'nama_lengkap'   => $request->nama_lengkap,
            'alamat_lengkap' => $request->alamat_lengkap,
            'kota'           => $request->kota,
            'kode_pos'       => $request->kode_pos,
            'email'          => $request->email,
            'nomor_whatsapp' => $request->nomor_whatsapp,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'paket'          => $request->paket_dipilih,
            'harga'          => $paket['harga'],
            'bonus_saldo'    => $paket['bonus_saldo'],
        ]);

        $noAdmin = '6285710465321'; 

        // 2. Bikin format pesan otomatisnya
        $pesanWA = "Halo Admin Dapi Laundry! 🧺\n\n";
        $pesanWA .= "Saya *" . $request->nama_lengkap . "* baru saja mendaftar Membership *" . $paket['label'] . "*.\n\n";
        $pesanWA .= "Total Tagihan: *Rp " . number_format($paket['harga'], 0, ',', '.') . "*\n\n";
        $pesanWA .= "Saya mau konfirmasi pembayaran nih, untuk transfernya ke rekening mana ya?";

        // 3. Ubah pesan jadi format link URL
       $linkWhatsApp = "https://api.whatsapp.com/send?phone=" . $noAdmin . "&text=" . urlencode($pesanWA);

        // 4. Lempar pelanggan langsung ke aplikasi WhatsApp
        return redirect()->away($linkWhatsApp);
    }
}