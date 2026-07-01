<?php

namespace App\Exports;

use App\Models\Membership;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MembershipExport implements FromCollection
{
    public function collection()
    {
        return Membership::all();
    }

    // Nentuin data apa aja yang mau dikeluarin ke Excel
    public function map($membership): array
    {
        return [
            $membership->id,
            $membership->nama_lengkap, 
            $membership->nomor_whatsapp,
            strtoupper($membership->paket),
            $membership->created_at ? $membership->created_at->format('d M Y') : '-',
        ];
    }

    // Bikin judul di baris paling atas Excel
    public function headings(): array
    {
        return [
            'ID Member',
            'Nama Member',
            'No. WhatsApp',
            'Paket',
            'Tanggal Daftar',
        ];
    }
}
