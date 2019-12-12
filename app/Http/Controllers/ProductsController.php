<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Webkul\Product\Models\ProductFlat;

class ProductsController extends Controller
{
    public function index()
    {
        $products = ProductFlat::where('status', 1)->where('locale', App::getLocale())->get()->sortByDesc('special_price');
        $ticker = "Customer message that can be changed for example, that goods are sold seasonally";
        return view('public.products.index', compact('products', 'ticker'));
    }

    public function show($id)
    {
        $product = ProductFlat::where('product_id', $id)->where('locale', App::getLocale())->first();
        return view('public.products.show', compact('product'));
    }
}
