<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\App;
use Artesaos\SEOTools\Facades\SEOMeta;

class ArticlesController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::where('active', true)->get();

        return view('public.articles.index', compact('articles'));
    }
    public function show(Request $request, $id)
    {
        $articles = Article::findOrFail($id);
        $locale = App::getLocale();
        SEOMeta::addKeyword([$articles->translate($locale)->keywords]);


        return view('public.articles.view', compact('articles', 'locale'));
    }
}
