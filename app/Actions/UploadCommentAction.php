<?php

namespace App\Actions;

use App\Models\Comment;
use App\Models\Place;

class UploadCommentAction
{

    public static function execute(array $data, int $userId, int $placeId)
    {
        $place = Place::findOrFail($placeId);

        Comment::create([
            'place_id' => $placeId,
            'user_id' => $userId,
            'body' => $data['body'],
            'subject' => $place->title
        ]);
    }
}
