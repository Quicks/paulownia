<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Webkul\Product\Models\ProductFlat;
use App\Models\Content;

class ProductsController extends Controller
{
    public function index()
    {
        $products = ProductFlat::where('status', 1)->where('locale', App::getLocale())->get()->sortByDesc('special_price');
        $ticker = Content::where('name', 'products_ticker')->first();
        return view('public.products.index', compact('products', 'ticker'));
    }

    public function show($url_key)
    {
        $product = ProductFlat::where('url_key', $url_key)->where('locale', App::getLocale())->first();
        return view('public.products.show', compact('product'));
    }
}
