<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Partner;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Helpers\ImageSaveHelper;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $partners = Partner::where('name', 'LIKE', "%$keyword%")
                ->orWhere('postcode', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('website', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $partners = Partner::latest()->paginate($perPage);
        }

        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required|max:90',
			'email' => 'required|email',
            'image' => 'image|max:20000',
            'images.*' => 'image|max:20000',
            'phone'=>'string|max:190',
            'posrcode'=>'string|max:190',
            'website'=>'url'
		]);

        $partners = Partner::create($request->all());
        $imageAtributes = $request->image_atr;
        $imageAtributes['imageable_id'] = $partners->id;
        $imageAtributes['imageable_type'] = 'App\Models\Partner';

        if ($request->hasFile('image')) {
            $imageAtributes['image'] = ImageSaveHelper::saveImageWithThumbnail(
                $request->file('image'), 'Partner', $partners->id, $request->watermark);
            Image::create($imageAtributes);
        }

        if ($request->hasFile('images')) {
            foreach ($request->images as $key => $image) {
                $imageAtributes['image'] = ImageSaveHelper::saveImageWithThumbnail(
                    $image, 'Partner', $partners->id, $request->watermark, $key);
                Image::create($imageAtributes);
            }
        }

        return redirect('admin/partners')->with('flash_message', 'Partner added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $partner = Partner::findOrFail($id);

        return view('admin.partners.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $partner = Partner::findOrFail($id);

        return view('admin.partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:90',
            'email' => 'required|email',
            'phone'=>'string|max:190',
            'posrcode'=>'string|max:190',
            'website'=>'url'
		]);
        
        $partner = Partner::findOrFail($id);
        $partner->update($request->except(['image_atr','image']));

        if ($request->image_atr) {
            foreach ($request->image_atr as $image_id => $image_atr) {
                $image = Image::find($image_id);
                $image->fill($image_atr);
                $image->save();
            }
        }

        return redirect('admin/partners')->with('flash_message', 'Partner updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        ImageSaveHelper::deleteAllModelImages($partner);
        $partner->delete();

        return redirect('admin/partners')->with('flash_message', 'Partner deleted!');
    }
}
