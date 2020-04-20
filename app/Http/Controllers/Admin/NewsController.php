<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Traits\ImagesTrait;


class NewsController extends Controller
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
        $news = new News(['active' => 1, 'publish_date' => date("Y-m-d")]);

        return view('admin.news.create', compact('news'));
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
            'active' => 'required|boolean',
            'publish_date' => 'required|date',
            'video' => 'url'
        ]);
        $requestData = $request->all();
        if (!empty($request->video)) {
            parse_str(parse_url($request->video, PHP_URL_QUERY), $videoId);
            $requestData['video'] = 'https://www.youtube.com/embed/' . $videoId['v'];
        }

        $requestData['admin_id'] = auth()->guard('admin')->user()->id;

        $news = News::create($requestData);
        $this->saveImages($news->id, 'News', $request->images, $request->watermark);

        return redirect('admin/news')->with('flash_message', 'News added!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
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
     * @param int $id
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
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'active' => 'required|boolean',
            'publish_date' => 'required|date',
            'video' => 'url'
        ]);
        $news = News::findOrFail($id);
        if (!empty($request->video)) {
            $urlVideoPath = explode("/", parse_url($request->video, PHP_URL_PATH));
            if ($urlVideoPath[1] !== "embed") {
                parse_str(parse_url($request->video, PHP_URL_QUERY), $videoId);
                $data = 'https://www.youtube.com/embed/' . $videoId['v'];
                $request->merge(['video' => $data]);
            }
        }
        $news->update($request->except(['image_atr', 'image']));
        $this->saveImages($news->id, 'News', $request->images, $request->watermark);

        return redirect('admin/news')->with('flash_message', 'News updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        ImageSaveHelper::deleteAllModelImages($news);
        $news->delete();

        return redirect('admin/news')->with('flash_message', 'News deleted!');
    }

    
}
