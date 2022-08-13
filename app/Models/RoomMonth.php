<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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
    public function scopePriceByMonthIdAndRoom(Builder $query, string $monthID, Room $room)
    {
        return $query->where('room_id','=', $room->id)
            ->where('month_id','=',$monthID)
            ->get()[0];
    }
}
