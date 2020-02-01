<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Treatise;
use Illuminate\Http\Request;
use App\Models\News;
use Artesaos\SEOTools\Facades\SEOMeta;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $months = range(1, 12);
        $years = range(2019, date('Y'));
        $news = News::where('active', true)->get();
        $articles = Article::where('active', true)->get();
        $treatises = Treatise::where('active', true)->get();
        $allNews = $news->concat($articles)->concat($treatises)->sortByDesc('publish_date')->paginate(3);
        if ($request->ajax()) {
            $view = view('public.news.newsData',compact('allNews'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('public.news.index', compact('news',
            'articles', 'treatises', 'allNews', 'years', 'months'));
    }
    public function show(Request $request, $type, $id)
    {
        if ($type == 'News') {
            $news = News::find($id);
        } elseif ($type == 'Article') {
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
