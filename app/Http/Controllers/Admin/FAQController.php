<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Content;
use App\Models\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FAQController extends Controller
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
            $faq = FAQ::where('question', 'LIKE', "%$keyword%")
                ->orWhere('answer', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $faq = FAQ::latest()->paginate($perPage);
        }

        return view('admin.f-a-q.index', compact('faq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $topics = Content::where('name', 'like', '%topic%')->get();

        return view('admin.f-a-q.create', compact('topics'));
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
            'content_id' => 'required'
		]);
        $requestData = $request->all();

        FAQ::create($requestData);

        return redirect('admin/f-a-q')->with('flash_message', 'FAQ added!');
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
        $faq = FAQ::findOrFail($id);

        return view('admin.f-a-q.show', compact('faq'));
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
        $topics = Content::where('name', 'like', '%topic%')->get();
        $faq = FAQ::findOrFail($id);

        return view('admin.f-a-q.edit', compact('faq', 'topics'));
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
            'content_id' => 'required'
		]);
        $requestData = $request->all();

        $faq = FAQ::findOrFail($id);

        $faq->update($requestData);

        return redirect('admin/f-a-q')->with('flash_message', 'FAQ updated!');
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
        FAQ::destroy($id);

        return redirect('admin/f-a-q')->with('flash_message', 'FAQ deleted!');
    }
}
