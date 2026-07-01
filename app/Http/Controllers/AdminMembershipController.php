<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;
class AdminMembershipController extends Controller
{
    public function index()
    {
        // 1. Ambil semua data membership dari yang paling baru daftar
        $memberships = Membership::orderBy('created_at', 'desc')->get();

        // 2. Hitung TOTAL PENDAPATAN (Cuma ngitung yang statusnya 'aktif')
        $totalPendapatan = Membership::where('status', 'aktif')->sum('harga');

        // 3. Hitung TOTAL MEMBER AKTIF
        $totalMemberAktif = Membership::where('status', 'aktif')->count();

        // Lempar datanya ke file tampilan (blade)
       return view('membership.admin_membership', compact('memberships', 'totalPendapatan', 'totalMemberAktif'));
    }
}
