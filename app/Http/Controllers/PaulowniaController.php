<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webkul\Product\Models\ProductFlat;
use Illuminate\Support\Facades\App;
use Webkul\Attribute\Models\Attribute;

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
        $types = Attribute::where('code', 'type_of_paulownia')->first()->options()->get();
        $productsFirst = ProductFlat::where('status', 1)->where('type_of_paulownia_label', $types->first()->label)->where('locale', App::getLocale())->limit(4)->get()->sortByDesc('special_price');

        return view('public.paulownia.type', compact('types', 'productsFirst'));

    }

    public function getProductsType (Request $request)
    {
        $products = ProductFlat::where('status', 1)->where('type_of_paulownia_label', $request->type)->where('locale', App::getLocale())->limit(4)->get()->sortByDesc('special_price');
        $view = view('public.paulownia.products-type',compact('products'))->render();
        return response()->json(['html'=>$view]);
    }

}
