<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutRoomType extends Model
{
    use HasFactory;

    public function aboutRooms()
    {
        return $this->hasMany(RoomAbout::class);
    }
}
