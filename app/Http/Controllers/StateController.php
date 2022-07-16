<?php

namespace App\Http\Controllers;

use App\Actions\PlaceActions\UploadRatingAction;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function storeRating(Request $request, int $userId, int $placeId)
    {
        $data = $request->all();
        $request->validate([
            'experience' => 'required|integer',
        ]);

        UploadRatingAction::execute($data, $userId, $placeId);
        return redirect()->route('placeSingle', $placeId)->with('success', "Спасибо за ваш голос!");
    }

}
