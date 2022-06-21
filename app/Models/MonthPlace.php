<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthPlace extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table="months_places";

    public function place()
    {
        return $this->belongsTo(Room::class);
    }
}
