<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Http\Traits\ImagesTrait;

class GalleriesController extends Controller
{
    use ImagesTrait;
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
        $gallery = new Gallery(['active' => true]);
        return view('admin.galleries.create', compact('gallery'));
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
			'active' => 'required|boolean'
		]);
            
        $gallery = Gallery::create($request->all());
        $this->saveImages($gallery->id, 'Gallery', $request->images, $request->watermark);

        return redirect('admin/galleries')->with('flash_message', 'Gallery added!');
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
            'active' => 'required|boolean'
        ]);
        $gallery = Gallery::findOrFail($id);

        $gallery->update($request->all());
        $this->saveImages($gallery->id, 'Gallery', $request->images, $request->watermark);

        return redirect('admin/galleries')->with('flash_message', 'Gallery updated!');
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
        ImageSaveHelper::deleteAllModelImages($gallery);
        $gallery->delete();
        return redirect('admin/galleries')->with('flash_message', 'Gallery deleted!');
    }
}
