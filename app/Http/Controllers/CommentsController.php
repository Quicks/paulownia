<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function create (Request $request)
    {
        $comment = new Comment();
        $comment->fill($request->all());
        $comment->save();

        return redirect()->route('public.news.show', ['news' => 'news', 'id' => $request->commentable_id]);
    }
}
