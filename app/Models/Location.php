<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function places()
    {
        return $this->hasMany(Place::class);
    }

    public function parentLocation()
    {
        return $this->belongsTo(ParentLocation::class);
    }
}
