<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\App;
use Artesaos\SEOTools\Facades\SEOMeta;

class GalleriesController extends Controller
{
    public function index()
    {
        $galleries = Gallery::where('active', true)->get();

        return view('public.galleries.index', compact('galleries'));
    }
    public function show($id)
    {
        $gallery = Gallery::findOrFail($id);

        SEOMeta::addKeyword([$gallery->keywords]);
        SEOMeta::setTitle($gallery->title ." - ".env('APP_NAME'));
        SEOMeta::setDescription(substr(strip_tags($gallery->desc), 0, 159));

        return view('public.galleries.show', compact('gallery'));
    }

}
