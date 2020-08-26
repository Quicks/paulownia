<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function create (Request $request)
    {
        $request->validate([
            'g-recaptcha-response' => 'recaptcha',
        ]);
        $comment = new Comment();
        $comment->fill($request->all());
        $comment->save();

        return redirect()->back();
    }

}
