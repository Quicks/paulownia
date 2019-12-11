<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webkul\Product\Models\ProductFlat;

class ProductsController extends Controller
{
    public function index()
    {
        $products = ProductFlat::where('status', 1)->get();
        return view('public.products.index', compact('products'));
    }

    public function show($id)
    {
        $product = ProductFlat::where('product_id', $id)->first();
        return view('public.products.show', compact('product'));
    }
}
