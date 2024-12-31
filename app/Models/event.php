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
        'organizer_id',
        'venue_id',
    ];

    // Relasi One-to-Many dengan Ticket
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    // Relasi Many-to-Many dengan Genre
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_events');
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
