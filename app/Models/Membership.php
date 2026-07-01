<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Membership extends Authenticatable
{
    protected $table = 'memberships';

    protected $fillable = [
        'nama_lengkap',
        'alamat_lengkap',
        'kota',
        'kode_pos',
        'email',
        'password',
        'nomor_whatsapp',
        'tanggal_lahir',
        'paket',
        'harga',
        'bonus_saldo',
        'saldo',
        'tgl_mulai',
        'tgl_expired',
        'status',
    ];

    protected $hidden = ['password'];

    protected $casts = [
        'tgl_mulai'     => 'date',
        'tgl_expired'   => 'date',
        'tanggal_lahir' => 'date',
    ];

    public function mauExpired(): bool
    {
        $sisa = now()->diffInDays($this->tgl_expired, false);
        return $sisa <= 7 && $sisa >= 0 && $this->status === 'aktif';
    }

    public function sudahExpired(): bool
    {
        return now()->gt($this->tgl_expired);
    }

    public function labelPaket(): string
    {
        return match($this->paket) {
            'silver'   => 'Paket Silver',
            'gold'     => 'Paket Gold',
            'platinum' => 'Paket Platinum',
            default    => '-',
        };
    }
}