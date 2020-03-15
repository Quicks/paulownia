<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\App;
use Artesaos\SEOTools\Facades\SEOMeta;

class GalleriesController extends Controller
{
    public function index(Request $request, $id)
    {   
        $galleries = Gallery::where('active', true)->get();
        $gallery = $id ? Gallery::findOrFail($id) : $galleries->first();

        if($galleries->count() > 0) {
            SEOMeta::addKeyword([$gallery->keywords]);
            SEOMeta::setTitle($gallery->title ." - ".env('APP_NAME'));
            SEOMeta::setDescription(substr(strip_tags($gallery->desc), 0, 159));
        }

        return view('public.galleries.index', compact('galleries', 'gallery'));
    }

}
