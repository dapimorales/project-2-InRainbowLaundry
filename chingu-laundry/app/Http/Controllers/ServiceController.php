<?php

namespace App\Http\Controllers;

use App\Models\Service; // Penting: Biar bisa ambil data dari tabel
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all(); 
        return view('services.index', compact('services'));
    }


    public function store(Request $request)
    {
        // 1. Validasi input biar datanya gak ngaco
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'harga'        => 'required|numeric',
            'satuan'       => 'required|string|max:50',
        ]);

        // 2. Simpan ke database menggunakan Model Service
        // Ini bakal jalan karena kita udah isi $fillable di Model tadi
        Service::create([
            'nama_layanan' => $request->nama_layanan,
            'harga'        => $request->harga,
            'satuan'       => $request->satuan,
        ]);

        // 3. Balikin ke halaman daftar dengan pesan sukses
        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil ditambah, Masbro!');
    }
    public function create()
{
    return view('services.create');
}
// Munculin form edit
public function edit($id)
{
    $service = Service::findOrFail($id);
    return view('services.edit', compact('service'));
}

// Proses update data ke DB
public function update(Request $request, $id)
{
    $request->validate([
        'nama_layanan' => 'required|string|max:255',
        'harga'        => 'required|numeric',
        'satuan'       => 'required|string',
    ]);

    $service = Service::findOrFail($id);
    $service->update($request->all());

    return redirect()->route('layanan.index')->with('success', 'Data berhasil diupdate!');
}

// Proses hapus data
public function destroy($id)
{
    $service = Service::findOrFail($id);
    $service->delete();

    return redirect()->route('layanan.index')->with('success', 'Layanan berhasil dihapus!');
}
}