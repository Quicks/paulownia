<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function notFound()
    {
        
        return view('public.home.not_found');
    }

    /**
     * @return json with slides
     */
    public function getJson(\Illuminate\Http\Request $request)
    {
        $slides = \App\Models\Slider::with('image')->latest()->take(3)->get();
        if ($request->ajax()) {
            return response()->json(compact('slides'));
        }
    }

}
