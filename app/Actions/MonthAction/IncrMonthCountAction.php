<?php
namespace App\Actions\MonthAction;

use App\Models\Month;

class IncrMonthCountAction
{

    public static function execute(Month $month)
    {
        $month->count += 1;
        $month->save();
    }
}
