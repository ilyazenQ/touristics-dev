<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomAbout extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function aboutMod()
    {
        return $this->belongsTo(AboutRoomMode::class);
    }

    public function aboutType()
    {
        return $this->belongsTo(AboutRoomType::class);
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }
}
