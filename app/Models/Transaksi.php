<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\detail_transaksi;

class Transaksi extends Model
{
    protected $fillable = [
        'user_id',
        'event_id',
        'grand_total',
        'status',
    ];

    // Relasi Many-to-One dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi Many-to-One dengan Event
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // Relasi One-to-Many dengan Detail Transaksi
    public function detailTransaksis()
    {
        return $this->hasMany(Detail_Transaksi::class);
    }
}