<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PendapatanExport implements FromView
{
    protected $bulan;

    public function __construct($bulan)
    {
        $this->bulan = $bulan;
    }

    public function view(): View
    {
        // 1. QUERY SUMMARY
        $querySummary = Order::select(
            DB::raw("DATE_FORMAT(tgl_masuk, '%Y-%m') as bulan_tahun"),
            \Illuminate\Support\Facades\DB::raw("SUM(CASE WHEN status_bayar = 'lunas' THEN 1 ELSE 0 END) as total_transaksi"),
            DB::raw("SUM(CASE WHEN status_bayar = 'lunas' THEN total_harga ELSE 0 END) as total_pendapatan")
        );

        if ($this->bulan != '') {
            $querySummary->whereRaw("DATE_FORMAT(tgl_masuk, '%Y-%m') = ?", [$this->bulan]);
        }

        $laporan = $querySummary->groupBy('bulan_tahun')->orderBy('bulan_tahun', 'desc')->get();

        $laporan->transform(function ($item) {
            $item->bulan_format = Carbon::createFromFormat('Y-m', $item->bulan_tahun)->translatedFormat('F Y');
            return $item;
        });

        // 2. QUERY DETAIL LUNAS
        $queryDetail = Order::with('customer')->where('status_bayar', 'lunas');
        if ($this->bulan != '') {
            $queryDetail->whereRaw("DATE_FORMAT(tgl_masuk, '%Y-%m') = ?", [$this->bulan]);
        }
        $detail_lunas = $queryDetail->orderBy('tgl_masuk', 'desc')->get();

        // Tambahkan compact('detail_lunas')
        return view('transaksi.pendapatan_cetak', compact('laporan', 'detail_lunas'));
    }
}