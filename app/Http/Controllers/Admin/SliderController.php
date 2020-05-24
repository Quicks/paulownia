<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Slider;
use App\Http\Requests\SliderRequest;
use Illuminate\Http\Request;
use App\Http\Traits\ImagesTrait;

class SliderController extends Controller
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
            $sliders = Slider::where('title', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $sliders = Slider::latest()->paginate($perPage);
        }
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $slider = new Slider();
        return view('admin.slider.create', compact('slider'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(SliderRequest $request)
    {
        $slider = Slider::create($request->all());
        $this->saveImages($slider->id, 'Slider', $request->images, false);

        return redirect('admin/slider')->with('flash_message', 'Slider added!');
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
        $slider = Slider::findOrFail($id);

        return view('admin.slider.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($webkulSlider)
    {
        $slider = Slider::findOrFail($webkulSlider->id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $webkulSlider)
    {
        
        $requestData = $request->all();
        
        $slider = Slider::findOrFail($webkulSlider->id);
        $slider->update($requestData);
        $this->saveImages($slider->id, 'Slider', $request->images, false);

        return redirect('admin/slider')->with('flash_message', 'Slider updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($webkulSlider)
    {
        Slider::destroy($webkulSlider->id);

        return redirect('admin/slider')->with('flash_message', 'Slider deleted!');
    }
}
