<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Helpers\ImageSaveHelper;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    public function createImage(Request $request)
    {
        $imageable_id = $request->imageable_id;
        $imageable_type = $request->imageable_type;
        $redirect_route = $request->redirect_route;
        return view('admin.add-images.add_image', compact('imageable_id', 'imageable_type', 'redirect_route'));
    }

    public function cropImage (Request $request, $id)
    {
        $image = Image::findOrFail($id);
        $redirect_route = url()->previous();
        return view('admin.add-images.crop_image', compact('image', 'redirect_route'));
    }

    public function storeImage (Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'required|image|max:20000'
        ]);
        $imageAtributes = $request->image_atr;
        $imageAtributes['image'] = ImageSaveHelper::saveImageWithThumbnail($request->file('image'), $request->watermark);
        $imageAtributes['imageable_id'] = $id;
        $imageAtributes['imageable_type'] = $request->imageable_type;
        Image::create($imageAtributes);

        return redirect($request->redirect_route)->with('flash_message', 'Image added!');
    }

    public function storeCrop (Request $request, $id)
    {  
        $this->validate($request, [
            'croppedImage' => 'required|image|max:20000'
        ]);
        $image = Image::findOrFail($id);
        Storage::delete($image->image);
        Storage::delete($image->thumbnail);
        $image->image = ImageSaveHelper::saveImageWithThumbnail($request->file('croppedImage'), $request->watermark);
        $image->save();

        return response('success', 200);
    }

    public function delete (Request $request, $imageId)
    {
        $image = Image::findOrFail($imageId);
        Storage::delete($image->image);
        Storage::delete($image->thumbnail);
        $image->delete();
        return back()->with('flash_message', 'Image deleted!');
    }

}
