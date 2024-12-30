<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    protected $fillable = [
        'nama_tiket',
        'harga',
        'event_id',
        'kategori',
    ];

    // Relasi Many-to-One dengan Event
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
