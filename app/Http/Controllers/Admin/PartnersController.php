<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Partner;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Helpers\ImageSaveHelper;
use App\Http\Traits\ImagesTrait;


class PartnersController extends Controller
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
        $partner = new Partner();
        return view('admin.partners.create', compact('partner'));
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

        $partner = Partner::create($request->all());
        $this->saveImages($partner->id, 'Partner', $request->images, $request->watermark);

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

        $this->saveImages($partner->id, 'Partner', $request->images, $request->watermark);


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
