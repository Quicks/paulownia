<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    public function createImage(Request $request)
    {
        $imageable_id = $request->imageable_id;
        $imageable_type = $request->imageable_type;
        $name = $request->name;

        return view('admin.add-images.add_image', ([
                'imageable_id'=>$imageable_id,
                'imageable_type'=>$imageable_type,
                'name'=>$name]));
    }

    public function storeImage (Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'required|image|max:2000'
        ]);
        $imageAtributes = $request->image_atr;
        $imageAtributes['image'] = $request->file('image')->store('uploads', 'public');
        $imageAtributes['imageable_id'] = $id;
        $imageAtributes['imageable_type'] = "App\Models\\" . $request->imageable_type;
        Image::create($imageAtributes);
        return redirect('admin/'. $request->name . '/' .$id)->with('flash_message', 'Image added!');
    }

    public function delete (Request $request, $imageId)
    {
        $image = Image::findOrFail($imageId);
        Storage::delete($image->image);
        $image->delete();
        return back()->with('flash_message', 'Image deleted!');
    }
}
