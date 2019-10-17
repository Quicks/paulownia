<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\App;
use Artesaos\SEOTools\Facades\SEOMeta;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $news = News::where('active', true)->get();

        return view('public.news.index', compact('news'));
    }
    public function show(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $locale = App::getLocale();
        SEOMeta::addKeyword([$news->translate($locale)->keywords]);

        return view('public.news.view', compact('news', 'locale'));
    }
}
