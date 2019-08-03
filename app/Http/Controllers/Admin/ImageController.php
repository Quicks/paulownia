<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;

class ImageController extends Controller
{
     public function createGalleryImage (Request $request, $galleryId)
    {
        $gallery = Gallery::findOrFail($galleryId);
        return view('admin.galleries.add_image', compact('gallery'));
    }

    public function storeGalleryImage (Request $request, $galleryId)
    {
        dd('storeGalleryImage', $galleryId, $request);
        $gallery = Gallery::findOrFail($galleryId);
        return view('admin.galleries.add_image', compact('gallery'));
    }
}
