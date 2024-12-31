<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\detail_transaksi;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'event_id',
        'grand_total',
        'status',
        'cancellation_reason',
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