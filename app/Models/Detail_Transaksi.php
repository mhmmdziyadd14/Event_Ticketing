<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detail_transaksi extends Model
{
    protected $fillable = [
        'tiket_id',
        'transaksi_id',
        'quantity',
        'subtotal',
    ];

    // Relasi Many-to-One dengan Ticket
    public function tiket()
    {
        return $this->belongsTo(Ticket::class, 'tiket_id');
    }

    // Relasi Many-to-One dengan Transaksi
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }
}

