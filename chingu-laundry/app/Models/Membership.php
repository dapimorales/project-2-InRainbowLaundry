<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'alamat_lengkap',
        'kota',
        'kode_pos',
        'email',
        'nomor_whatsapp',
        'tanggal_lahir',
        'paket',
        'harga',
        'bonus_saldo'
    ];
}
