<?php
namespace App\Actions\MonthAction;

use App\Models\Month;

class DecrMonthCountAction
{

    public static function execute(Month $month)
    {
        $month->count -= 1;
        $month->save();
    }
}
