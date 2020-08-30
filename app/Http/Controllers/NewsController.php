<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Treatise;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\News;
use Artesaos\SEOTools\Facades\SEOMeta;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $months = array_map(function ($n) {
            return sprintf('%02d', $n);
        }, range(1, 12));
        $years = range(2019, date('Y'));
        $currentDate = Carbon::now();
        $news = $this->filter($request,  News::withTranslation()->where([['active',  true], ['publish_date', '<=', $currentDate]]));
        $articles = $this->filter($request, Article::withTranslation()->where([['active', true], ['publish_date', '<=', $currentDate]]));
        $treatises = $this->filter($request,   Treatise::withTranslation()->where([['active', true], ['publish_date', '<=', $currentDate]]));

        if($request->has('topic')){
            if($request->topic == 'news') {
                $allNews = $news->sortByDesc('publish_date')->paginate(9);
            }
            if($request->topic == 'articles') {
                $allNews = $articles->sortByDesc('publish_date')->paginate(9);
            }
            if($request->topic == 'treatises') {
                $allNews = $treatises->sortByDesc('publish_date')->paginate(9);
            }
        } else {
            $allNews = $news->concat($articles)->concat($treatises)->sortByDesc('publish_date')->paginate(9);
        }

        if ($request->ajax()) {
            $view = view('public.news.newsData', compact('allNews'))->render();
            return response()->json(['html' => $view]);
        }

        return view('public.news.index', compact('news',
            'articles', 'treatises', 'allNews', 'years', 'months'));
    }

    public function filter($request, $query)
    {
        if ($request->has('month')) {
           $query->whereMonth('publish_date', $request->month);
        }
        if ($request->has('year')) {
            $query->whereYear('publish_date', $request->year);
        }

        return $query->get();
    }


    public function show($type, $id)
    {
        if ($type == 'news') {
            $news = News::find($id);
        } elseif ($type == 'article') {
            $news = Article::find($id);
        } else {
            $news = Treatise::find($id);
        }

        $previous = get_class($news)::where('publish_date', '<', $news->publish_date)
                                    ->where('active', true)
                                    ->orderBy('publish_date', 'desc')
                                    ->first();
        $next = get_class($news)::where('publish_date', '>', $news->publish_date)
                                ->where('active', true)
                                ->orderBy('publish_date')
                                ->first();

        SEOMeta::addKeyword([$news->keywords]);
        SEOMeta::setTitle($news->title . " - " . env('APP_NAME'));
        SEOMeta::setDescription(substr(strip_tags($news->text), 0, 159));

        return view('public.news.show', compact('news', 'previous', 'next'));
    }
}
