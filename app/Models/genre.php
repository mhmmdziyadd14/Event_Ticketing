<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class genre extends Model
{
    use HasFactory;
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
