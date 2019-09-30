<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\App;

class ArticlesController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::where('active', true)->get();
        App::setLocale($request->locale);

        return view('public.articles.index', compact('articles'));
    }
    public function show(Request $request, $id)
    {

        $articles = Article::findOrFail($id);
        App::setLocale($request->locale);
        $locale = App::getLocale();

        return view('public.articles.view', compact('articles', 'locale'));
    }
}
