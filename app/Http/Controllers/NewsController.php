<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\App;

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

        return view('public.news.view', compact('news', 'locale'));
    }
}
