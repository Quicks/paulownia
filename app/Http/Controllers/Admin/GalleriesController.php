<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class GalleriesController extends Controller
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
            $galleries = Gallery::where('name', 'LIKE', "%$keyword%")
                ->orWhere('active', 'LIKE', "%$keyword%")
                ->orWhere('title', 'LIKE', "%$keyword%")
                ->orWhere('desc', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $galleries = Gallery::latest()->paginate($perPage);
        }

        return view('admin.galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.galleries.create');
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
			'active' => 'required|boolean',
            'image' => 'required|image|max:2000'
		]);

        $newGalery = Gallery::create($request->except(['image_atr','image']));

        if ($request->hasFile('image')) {
            $imageAtributes = $request->image_atr;
            $imageAtributes['image'] = $request->file('image')->store('uploads', 'public');
            $imageAtributes['imageable_id'] = $newGalery->id;
            $imageAtributes['imageable_type'] = 'App\Models\Gallery';
            Image::create($imageAtributes);
        }

        return redirect('admin/galleries')->with('status', 'Gallery added!');
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
        $gallery = Gallery::findOrFail($id);

        return view('admin.galleries.show', compact('gallery'));
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
        $gallery = Gallery::findOrFail($id);

        return view('admin.galleries.edit', compact('gallery'));
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
            'active' => 'required|boolean'
        ]);
        $gallery = Gallery::findOrFail($id);

        $gallery->update($request->except(['image_atr','image']));

        foreach ($request->image_atr as $image_id => $image_atr) {
            $image = Image::find($image_id);
            $image->fill($image_atr);
            $image->save();
        }

        return redirect('admin/galleries')->with('status', 'Gallery updated!');
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
        $gallery = Gallery::findOrFail($id);

        foreach ($gallery->images()->get() as $image) {
            Storage::delete($image->image);
            $image->delete();
        }
        $gallery->delete();
        return redirect('admin/galleries')->with('status', 'Gallery deleted!');
    }
}
