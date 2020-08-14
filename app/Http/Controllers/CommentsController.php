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

        if($request->commentable_type == 'App\Models\News') {
            $model = 'news';
            return redirect()->route('public.news.show', [$model => 'news', 'id' => $request->commentable_id]);
        }
        if($request->commentable_type == 'Webkul\Product\Models\ProductFlat') {
            return redirect()->route('public.products.show', ['slug' => $request->url] );
        }
    }

}
