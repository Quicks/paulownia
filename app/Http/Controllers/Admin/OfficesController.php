<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Office;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Helpers\ImageSaveHelper;

class OfficesController extends Controller
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
            $offices = Office::where('name', 'LIKE', "%$keyword%")
                ->orWhere('postcode', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('website', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $offices = Office::latest()->paginate($perPage);
        }

        return view('admin.offices.index', compact('offices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.offices.create');
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

        $offices = Office::create($request->all());
        $imageAtributes = $request->image_atr;
        $imageAtributes['imageable_id'] = $offices->id;
        $imageAtributes['imageable_type'] = 'App\Models\Office';

        if ($request->hasFile('image')) {
            $imageAtributes['image'] = ImageSaveHelper::saveImageWithThumbnail(
                $request->file('image'), 'Office', $offices->id, $request->watermark);
            Image::create($imageAtributes);
        }

        if ($request->hasFile('images')) {
            foreach ($request->images as $key => $image) {
                $imageAtributes['image'] = ImageSaveHelper::saveImageWithThumbnail(
                    $image, 'News', $offices->id, $request->watermark, $key);
                Image::create($imageAtributes);
            }
        }

        return redirect('admin/offices')->with('flash_message', 'Office added!');
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
        $office = Office::findOrFail($id);

        return view('admin.offices.show', compact('office'));
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
        $office = Office::findOrFail($id);

        return view('admin.offices.edit', compact('office'));
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

        $office = Office::findOrFail($id);
        $office->update($request->except(['image_atr','image']));

        if ($request->image_atr) {
            foreach ($request->image_atr as $image_id => $image_atr) {
                $image = Image::find($image_id);
                $image->fill($image_atr);
                $image->save();
            }
        }
        return redirect('admin/offices')->with('flash_message', 'Office updated!');
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
        $office = Office::findOrFail($id);
        ImageSaveHelper::deleteAllModelImages($office);
        $office->delete();

        return redirect('admin/offices')->with('flash_message', 'Office deleted!');
    }
}
