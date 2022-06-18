<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function places() {
        return $this->belongsToMany(Place::class);
    }

    public function rooms() {
        return $this->belongsToMany(Room::class);
    }

}
