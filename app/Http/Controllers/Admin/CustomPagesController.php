<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\CustomPage;
use Illuminate\Http\Request;
use Webkul\Attribute\Models\Attribute;


class CustomPagesController extends Controller
{

  public function index(Request $request)
    {
      $perPage = 25;
      $custom_pages = CustomPage::latest()->paginate($perPage);
      
      return view('admin.custom_pages.index', compact('custom_pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
      $possibleParents = CustomPage::whereNull('parent_id')->orWhere('parent_id', 0)->get();
      $possibleSiblings = CustomPage::all();
      $custom_page = new CustomPage();
      $possibleSorts = Attribute::where('code', 'type_of_paulownia')->first()->options;
      return view('admin.custom_pages.create', compact('custom_page', 'possibleSiblings', 'possibleParents', 'possibleSorts'));
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
        'link' => 'required',
      ]);
      $requestData = $request->all();
      $custom_page = CustomPage::create($request->all());
      $custom_page->siblings()->sync($request->siblings);
      return redirect('admin/custom_pages')->with('flash_message', 'CustomPage added!');
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
      $custom_page = CustomPage::findOrFail($id);

      return view('admin.custom_pages.show', compact('custom_page'));
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
      $custom_page = CustomPage::findOrFail($id);
      $possibleParents = CustomPage::whereNull('parent_id')->orWhere('parent_id', 0)->get();
      $possibleSiblings = CustomPage::all();
      $possibleSorts = Attribute::where('code', 'type_of_paulownia')->first()->options;
      return view('admin.custom_pages.edit', compact('custom_page', 'possibleSiblings', 'possibleParents', 'possibleSorts'));
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
        'link' => 'required',
      ]);
      $custom_page = CustomPage::findOrFail($id);
      $custom_page->update($request->all());
      $custom_page->siblings()->sync($request->siblings);

      return redirect('admin/custom_pages')->with('flash_message', 'CustomPage updated!');
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
      $custom_page = CustomPage::findOrFail($id);
      $custom_page->delete();

      return redirect('admin/custom_pages')->with('flash_message', 'custom_page deleted!');
    }
  
}