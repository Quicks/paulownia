<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Traits\ImagesTrait;


class ArticlesController extends Controller
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
            $articles = Article::where('name', 'LIKE', "%$keyword%")
                ->orWhere('active', 'LIKE', "%$keyword%")
                ->orWhere('publish_date', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $articles = Article::latest()->paginate($perPage);
        }

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $article = new Article(['active' => 1, 'publish_date' => date("Y-m-d")]);
        return view('admin.articles.create', compact('article'));
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
			'publish_date' => 'required|date'
        ]);
        $requestData = $request->all();
        $article = Article::create($requestData);
        $this->saveImages($article->id, 'Article', $request->images, $request->watermark);
    
        return redirect('admin/articles')->with('flash_message', 'Article added!');
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
        $article = Article::findOrFail($id);

        return view('admin.articles.show', compact('article'));
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
        $article = Article::findOrFail($id);

        return view('admin.articles.edit', compact('article'));
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
			'active' => 'required|boolean',
			'publish_date' => 'required|date'
		]);
        $article = Article::findOrFail($id);
        $article->update($request->except(['image_atr','image']));
        
        $this->saveImages($article->id, 'Article', $request->images, $request->watermark);

        return redirect('admin/articles')->with('flash_message', 'Article updated!');
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
        $article = Article::findOrFail($id);
        $this->deleteAllModelImages($article);
        $article->delete();

        return redirect('admin/articles')->with('flash_message', 'Article deleted!');
    }

}
