<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Webkul\Product\Models\ProductFlat;

class ProductsController extends Controller
{
    public function index()
    {
        $productFlat = new ProductFlat();
        $products = $productFlat->get();
        foreach ($products as $product) {
            $product_imgs = DB::table('product_images')->where('product_id', $product->product_id)->first();
            if(!empty($product_imgs)){
                $product->img = $product_imgs->path;
            }
        }
        return view('public.products.index', compact('products'));
    }

    public function show($id)
    {
        $product = ProductFlat::where('product_id', $id)->firstOrFail();
        $product_imgs = DB::table('product_images')->where('product_id', $id)->get();
        $categories = DB::table('product_categories')->where('product_id', $id)->get();
        foreach ($categories as $item)
        {
            $category_id = $item->category_id;
        }
        if(!empty($category_id)) {
            $categoryCol = DB::table('category_translations')->where('id', $category_id)->get();
            foreach ($categoryCol as $item) {
                $category = $item->name;
            }
        }
        return view('public.products.show', compact('product', 'product_imgs', 'category'));
    }
}
