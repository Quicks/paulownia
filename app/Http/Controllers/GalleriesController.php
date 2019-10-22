<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\App;
use Artesaos\SEOTools\Facades\SEOMeta;

class GalleriesController extends Controller
{
    public function index(Request $request)
    {
        $galleries = Gallery::where('active', true)->get();

        return view('public.galleries.index', compact('galleries'));
    }
    public function show(Request $request, $id)
    {
        $galleries = Gallery::findOrFail($id);
        $locale = App::getLocale();
        SEOMeta::addKeyword([$galleries->keywords]);
        SEOMeta::setTitle($galleries->title);
        SEOMeta::setDescription(substr(strip_tags($galleries->desc), 0, 159));

        return view('public.galleries.view', compact('galleries', 'locale'));
    }
}
