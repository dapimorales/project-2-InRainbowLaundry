<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
   public function index()
    {
        // Ambil semua data customer
        $customers = Customer::latest()->get();
        
        return view('customers.index', compact('customers'));
    }
    public function storeReservasi(Request $request)
{
    // 1. Validasi dulu biar datanya bener
    $request->validate([
        'nama'   => 'required',
        'no_hp'  => 'required',
        'alamat' => 'required',
    ]);

    // 2. Simpan ke tabel customers
    \App\Models\Customer::create([
        'nama'   => $request->nama,
        'no_hp'  => $request->no_hp,
        'alamat' => $request->alamat,
    ]);

    // 3. Balikin ke landing page dengan pesan sukses
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
