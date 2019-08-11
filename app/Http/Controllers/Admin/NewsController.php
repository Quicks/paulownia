<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\News;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
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
            $news = News::where('name', 'LIKE', "%$keyword%")
                ->orWhere('active', 'LIKE', "%$keyword%")
                ->orWhere('publish_date', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $news = News::latest()->paginate($perPage);
        }
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.news.create');
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
			'publish_date' => 'required|date',
            'image' => 'image|max:2000'
		]);
        $requestData = $request->all();
        
        $news = News::create($requestData);

        if ($request->hasFile('image')) {
            $imageAtributes = $request->image_atr;
            $imageAtributes['image'] = $request->file('image')->store('uploads', 'public');
            $imageAtributes['imageable_id'] = $news->id;
            $imageAtributes['imageable_type'] = 'App\Models\News';
            Image::create($imageAtributes);
        }


        return redirect('admin/news')->with('flash_message', 'News added!');
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
        $news = News::findOrFail($id);

        return view('admin.news.show', compact('news'));
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
        $news = News::findOrFail($id);

        return view('admin.news.edit', compact('news'));
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
			'active' => 'required|boolean',
			'publish_date' => 'required|date'
		]);

        $news = News::findOrFail($id);
        $news->update($request->except(['image_atr','image']));
        if ($request->image_atr) {
            foreach ($request->image_atr as $image_id => $image_atr) {
                $image = Image::find($image_id);
                $image->fill($image_atr);
                $image->save();
            }
        }

        return redirect('admin/news')->with('flash_message', 'News updated!');
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
        $news = News::findOrFail($id);

        foreach ($news->images()->get() as $image) {
            Storage::delete($image->image);
            $image->delete();
        }
        $news->delete();

        return redirect('admin/news')->with('flash_message', 'News deleted!');
    }
}
