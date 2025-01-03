<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class artist_event extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
        'artists_id',
    ];

    // Relasi Many-to-One dengan Event
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // Relasi Many-to-One dengan artists
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}
