<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;  

class PaymentController extends Controller
{
    // Nampilin halaman tagihan (invoice)
    public function show($id)
    {
        $member = Membership::findOrFail($id);
        
        // Bikin batas waktu 24 jam dari waktu pendaftaran
        
        $batasWaktu = $member->created_at->addHours(24)->format('M d, Y H:i:s');
        
        return view('dummy_payment', compact('member', 'batasWaktu'));
    }

    // Proses pas tombol "Bayar" diklik
    public function process(Request $request, $id)
    {
        $member = Membership::findOrFail($id);
        
        // Tangkap metode pembayaran dari dropdown HTML tadi
        $metode = $request->metode_pembayaran;
        
        // Ubah status dari 'pending' jadi 'aktif'
        $member->update([
            'status' => 'aktif'
        ]);

        // Lempar ke halaman depan bawa pesan sukses dinamis
        return redirect('/')->with('success', "Hore! Pembayaran sebesar Rp " . number_format($member->harga, 0, ',', '.') . " via $metode berhasil. Membership sudah aktif!");
    }

}
