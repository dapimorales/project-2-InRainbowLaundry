<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::create([
            'nama_layanan' => 'Cuci Setrika Kiloan',
            'harga' => 7000,
            'satuan' => 'kg'
        ]);

        Service::create([
            'nama_layanan' => 'Cuci Selimut',
            'harga' => 15000,
            'satuan' => 'pcs'
        ]);
        
        Service::create([
            'nama_layanan' => 'Cuci Sepatu',
            'harga' => 25000,
            'satuan' => 'pcs'
        ]);
    }
}