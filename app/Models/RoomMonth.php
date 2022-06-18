<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomMonth extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function scopeFindByTitleAndRoom($query, $title, $roomId)
    {
        return $query->where('title', '=' , $title)
            ->where('room_id', '=' , $roomId)
            ->get()[0];
    }
}
