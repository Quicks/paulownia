<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
     public function createGalleryImage (Request $request, $galleryId)
    {
        $gallery = Gallery::findOrFail($galleryId);
        return view('admin.galleries.add_image', compact('gallery'));
    }

    public function storeGalleryImage (Request $request, $galleryId)
    {
        $this->validate($request, [
            'image' => 'required|image|max:2000'
        ]);
        $imageAtributes = $request->image_atr;
        $imageAtributes['image'] = $request->file('image')->store('uploads', 'public');
        $imageAtributes['imageable_id'] = $galleryId;
        $imageAtributes['imageable_type'] = 'App\Models\Gallery';
        Image::create($imageAtributes);
        return redirect('admin/galleries/'.$galleryId)->with('flash_message', 'Image added!');
    }

    public function delete (Request $request, $imageId)
    {
        $image = Image::findOrFail($imageId);
        Storage::delete($image->image);
        $image->delete();
        return back()->with('flash_message', 'Image deleted!');;
    }
}
