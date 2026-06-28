<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_invoice', 
        'customer_id', 
        'tgl_masuk', 
        'tgl_selesai', 
        'total_harga', 
        'status_order', 
        'status_bayar',
        'rencana_ambil',
        'tipe_pesanan'
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
