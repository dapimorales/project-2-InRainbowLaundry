<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Nama tabelnya
    protected $table = 'customers';

    // Kolom yang boleh diisi (Mass Assignment)
    // Sesuai dengan gambar phpMyAdmin lu tadi
    protected $fillable = [
        'nama',
        'no_hp',
        'alamat',
    ];

    /**
     * Relasi ke Order (Opsional tapi Pro)
     * Satu customer bisa punya banyak orderan laundry
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
