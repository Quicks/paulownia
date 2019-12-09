<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Helpers\ImageSaveHelper;
use Illuminate\Support\Facades\Storage;
use Webkul\Product\Repositories\ProductImageRepository;

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
            'image' => 'required_without:images|image|max:20000',
            'images.*' => 'required_without:image|image|max:20000'
        ]);

        $tmp = explode("\\", $request->imageable_type);
        $imageModelShortName = end($tmp);
        $imageAtributes = $request->image_atr;
        $imageAtributes['imageable_id'] = $id;
        $imageAtributes['imageable_type'] = $request->imageable_type;

        if ($request->hasFile('image')) {
            $imageAtributes['image'] = ImageSaveHelper::saveImageWithThumbnail(
                $request->file('image'), $imageModelShortName, $id, $request->watermark);
            Image::create($imageAtributes);
        }

        if ($request->hasFile('images')) {
            foreach ($request->images as $key => $image) {
                $imageAtributes['image'] = ImageSaveHelper::saveImageWithThumbnailNotEncoded(
                    $image, $imageModelShortName, $id, $request->watermark, $key);
                Image::create($imageAtributes);
            }
        }

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
        $tmp = explode("\\", $image->imageable_type);
        $imageModelShortName = end($tmp);
        $image->image = ImageSaveHelper::saveImageWithThumbnail($request->file('croppedImage'), 
            $imageModelShortName, $image->imageable_id, $request->watermark);
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

    /**
     * @param Request $request
     * @param ProductImageRepository $productImg
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, ProductImageRepository $productImg)
    {
        $adminImages = Image::all();
        $productImages = $productImg->all();
        $availableTypes = Image::select('imageable_type')->get();
        $allTypes = array();
            foreach ($availableTypes as $availableType)
            {
                array_push($allTypes, $availableType->imageable_type);
            }
            array_push($allTypes, 'App\Models\Product');
        $types = array_unique($allTypes);

        foreach($productImages as $productImage){
            $productImage->imageable_type = 'App\Models\Product';
        }

        $images = $adminImages->concat($productImages);

        if (!empty($request->get('type'))) {
            $images = $images->where('imageable_type', $request->get('type'));
        }

        return view('admin.images.index', compact('images', 'types'));
    }

    public function updateProductImage (Request $request, $id) {
        return 'Hello SSJ';
    }

}
