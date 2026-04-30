<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // Kasih tau Laravel nama tabelnya (opsional tapi bagus buat dokumentasi)
    protected $table = 'services'; 

    // WAJIB: Daftar kolom yang boleh diisi lewat form web
    protected $fillable = [
        'nama_layanan',
        'harga',
        'satuan',
    ];
}
