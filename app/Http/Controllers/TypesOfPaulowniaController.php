<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webkul\Product\Models\ProductFlat;
use Illuminate\Support\Facades\App;

class TypesOfPaulowniaController extends Controller
{
    public function type(Request $request)
    {   $products = ProductFlat::where('featured', 1)->where('status', 1)->where('locale', App::getLocale())->limit(4)->get()->sortByDesc('special_price');
        return view('public.paulownia.type', compact('products'));
    }
}