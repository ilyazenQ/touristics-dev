<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPlace extends Model
{
    use HasFactory;

    protected $table = "about_places";

    public function aboutMod()
    {
        return $this->belongsTo(AboutMod::class);
    }

    public function aboutType()
    {
        return $this->belongsTo(AboutType::class);
    }

    public function places()
    {
        return $this->belongsToMany(Place::class);
    }
}
