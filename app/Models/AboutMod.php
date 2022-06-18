<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutMod extends Model
{
    use HasFactory;

    protected $table = "about_modes";

    public function aboutPlaces()
    {
        return $this->hasMany(AboutPlace::class);
    }
}
