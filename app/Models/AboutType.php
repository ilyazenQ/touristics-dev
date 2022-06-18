<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutType extends Model
{
    use HasFactory;

    protected $table = "about_types";

    public function aboutPlaces()
    {
        return $this->hasMany(AboutPlace::class);
    }
}
