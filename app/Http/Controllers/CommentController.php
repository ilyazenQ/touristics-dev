<?php

namespace App\Http\Controllers;

use App\Actions\CommentActions\UploadCommentAction;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, int $userId, int $placeId)
    {
        $data = $request->all();

        $request->validate([
            'body' => 'required|string|max:60000',
        ]);

        UploadCommentAction::execute($data, $userId, $placeId);

        return redirect()->route('placeSingle', $placeId)->with('success', "Спасибо за комментарий!");
    }


}
