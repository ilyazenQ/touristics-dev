<?php

namespace App\Actions;

use Illuminate\Http\Request;

class SaveFiltersInSessionAction
{
    public static function execute(Request $request)
    {
        $filters = $request->get('filter');
        $sorts = $request->get('sort');

        session(['filter' => $filters, 'sort' => $sorts]);
    }
}
