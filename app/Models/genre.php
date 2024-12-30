<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class genre extends Model
{
    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    // Relasi Many-to-Many dengan Event
    public function events()
    {
        return $this->belongsToMany(Event::class, 'genre_events');
    }
}
