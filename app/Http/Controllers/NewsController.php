<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Treatise;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\App;
use Artesaos\SEOTools\Facades\SEOMeta;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $news = News::where('active', true)->get();
        $articles = Article::where('active', true)->get();
        $treatises = Treatise::where('active', true)->get();
        $allNews = $news->concat($articles)->concat($treatises)->sortBy('created_at')->paginate(3);

        return view('public.news.index', compact('news', 'articles', 'treatises', 'allNews'));
    }
    public function show(Request $request, $type, $id)
    {
        if ($type = 'News') {
            $news = News::findOrFail($id);
        } elseif ($type = 'Article') {
            $news = Article::find($id);
        } else {
            $news = Treatise::find($id);
        }
        SEOMeta::addKeyword([$news->keywords]);
        SEOMeta::setTitle($news->title ." - ".env('APP_NAME'));
        SEOMeta::setDescription(substr(strip_tags($news->text), 0, 159));

        return view('public.news.view', compact('news'));
    }
}
