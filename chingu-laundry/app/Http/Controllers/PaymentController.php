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
        return view('dummy_payment', compact('member'));
    }

    // Proses pas tombol "Bayar" diklik
    public function process($id)
    {
        $member = Membership::findOrFail($id);
        
        // Ubah status dari 'pending' jadi 'aktif'
        $member->update([
            'status' => 'aktif'
        ]);

        // Lempar ke halaman depan bawa pesan sukses
        return redirect('/')->with('success', 'Hore! Pembayaran berhasil, Membership kamu sudah aktif masbro!');
    }
}
