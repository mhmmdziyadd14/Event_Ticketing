<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class genre_event extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
        'genre_id',
    ];

    // Relasi Many-to-One dengan Event
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // Relasi Many-to-One dengan Genre
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}

