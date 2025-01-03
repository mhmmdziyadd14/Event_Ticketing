<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Venue extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'kapasitas',
        'alamat',
        'link_alamat',
        'deskripsi',
    ];

    // Relasi One-to-Many dengan Event
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
