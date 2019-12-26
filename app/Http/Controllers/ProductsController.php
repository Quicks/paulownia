<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Webkul\Product\Models\ProductFlat;
use App\Models\Content;
use Webkul\Category\Models\Category;
use Webkul\Product\Repositories\ProductRepository;

class ProductsController extends Controller
{
    public function index(Request $request, ProductRepository $product)
    {
        $products = ProductFlat::where('status', 1)->where('locale', App::getLocale())->get()->sortByDesc('special_price');
        $ticker = Content::where('name', 'products_ticker')->first();
        $categories = Category::all();
        if($request->has('category')){
            $category_id = Category::whereTranslation('slug', $request->category)->first()->id;
            $products = $product->getAll($category_id)->sortByDesc('special_price');
        }
        return view('public.products.index', compact('products', 'ticker', 'categories'));
    }

    public function show($url_key, ProductRepository $commodity)
    {
        $product = ProductFlat::where('url_key', $url_key)->where('locale', App::getLocale())->first();
        $categoryId = $product->product()->first()->categories()->first()->id;
        $similarProducts = $commodity->getAll($categoryId)->sortByDesc('special_price')->take(4);

        return view('public.products.show', compact('product', 'similarProducts'));
    }
}
