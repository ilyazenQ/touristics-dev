<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function type()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function images()
    {
        return $this->hasMany(RoomImage::class);
    }

    public function abouts()
    {
        return $this->belongsToMany(RoomAbout::class);
    }

    public function userFill()
    {
        return $this->hasOne(UserFillAboutRoom::class);
    }

    public function months()
    {
        return $this->hasMany(RoomMonth::class);
    }

    public function scopePlaceInMonth(Builder $query, string $monthID): Builder
    {
        $placeID = request()->session()->get('place_id');
        $roomIDs = RoomMonth::where('month_id','=',$monthID)->where('place_id','=',$placeID)->get()->pluck('room_id')->toArray();
        return $query->whereIn('id', $roomIDs);
    }

}
