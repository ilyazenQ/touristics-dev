<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function social()
    {
        return $this->hasOne(SocialPlace::class);
    }

    public function state()
    {
        return $this->hasOne(State::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function images()
    {
        return $this->hasMany(ImagePlace::class);
    }

    public function abouts()
    {
        return $this->belongsToMany(AboutPlace::class);
    }

    public function userFill()
    {
        return $this->hasOne(UserFillAboutPlace::class);
    }

    public function months()
    {
        return $this->hasMany(MonthPlace::class);
    }

    public function getReadableRating(int $rating)
    {
        switch ($rating) {
            case 0:
                echo "Без оценки";
                break;
            case 1:
                echo "Плохо";
                break;
            case 2:
                echo "Удовлетворительно";
                break;
            case 3:
                echo "Хорошо";
                break;
            case 4:
                echo "Отлично";
                break;
        }
    }
}
