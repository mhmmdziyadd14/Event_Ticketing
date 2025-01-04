<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class artist extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'nama',
        'deskripsi',
        'foto',
    ];

    // Many-to-Many relationship with Events
    public function events()
    {
        return $this->belongsToMany(Event::class, 'artist_events', 'artist_id', 'event_id');
    }
}
