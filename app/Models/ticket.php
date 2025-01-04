<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'harga',
        'event_id',
        'stok',
        'stok',
        'type',
        'status',
    ];

    // Relasi Many-to-One dengan Event
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
