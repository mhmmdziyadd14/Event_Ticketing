<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class event extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'deskripsi',
        'tanggal',
        'foto',
        'organizer_id',
        'venue_id',
    ];

    // Relasi One-to-Many dengan Ticket
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    // Many-to-Many relationship with Artists
    public function artists()
    {
        return $this->belongsToMany(Artist::class, 'artist_events', 'event_id', 'artist_id');
    }


    // Relasi Many-to-One dengan Venue
    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    // Relasi Many-to-One dengan User (Organizer)
    public function organizer()
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }
}
