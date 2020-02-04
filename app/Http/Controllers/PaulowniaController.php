<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webkul\Product\Models\ProductFlat;
use Illuminate\Support\Facades\App;

class PaulowniaController extends Controller
{
    public function index(Request $request)
    {
        return view('public.paulownia.about');
    }

    public function planting(Request $request)
    {
        return view('public.paulownia.planting');
    }

    public function type(Request $request)
    {
        $products = ProductFlat::where('featured', 1)->where('status', 1)->where('locale', App::getLocale())->limit(4)->get()->sortByDesc('special_price');
        return view('public.paulownia.type', compact('products'));

    }

}
