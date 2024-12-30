<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class venue extends Model
{
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
