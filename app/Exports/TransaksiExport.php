<?php

namespace App\Exports;

use App\Models\Order; // Sesuaikan sama nama model lu
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TransaksiExport implements FromView, ShouldAutoSize
{
    protected $tipe;

    // Buat nangkep filter tipe pesanan dari Controller
    public function __construct($tipe)
    {
        $this->tipe = $tipe;
    }

    public function view(): View
    {
        
        {
        // 👇 UBAH DI SINI: Tambahin with('customer')
        $query = Order::with('customer');

        // Kalau filternya bukan kosong atau "semua", eksekusi filternya
        if ($this->tipe && $this->tipe != 'semua') {
            $query->where('tipe_pesanan', $this->tipe);
        }

        return view('transaksi.export', [
            'transaksi' => $query->get()
        ]);
        }
    }
}