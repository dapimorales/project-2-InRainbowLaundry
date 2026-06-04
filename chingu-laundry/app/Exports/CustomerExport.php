<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CustomerExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Customer::all();
    }

    public function map($customer): array
    {
        return [
            $customer->id,
            $customer->nama, 
            $customer->no_hp,
            $customer->alamat,
            $customer->created_at ? $customer->created_at->format('d M Y') : '-',
        ];
    }

    public function headings(): array
    {
        return [
            'ID Pelanggan',
            'Nama Pelanggan',
            'No. WhatsApp',
            'Alamat',
            'Terdaftar Sejak',
        ];
    }
}