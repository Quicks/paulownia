<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Product;
use App\Models\Image;
use App\Models\Content;
use Webkul\Category\Models\Category;
use Webkul\Product\Models\ProductFlat;
use Webkul\Product\Repositories\ProductRepository;

class ProductsController extends Controller
{
    public function index(Request $request, ProductRepository $product)
    {
        $products = $product->getAll();
        return view('public.products.index', compact('products'));
    }

    public function show($url_key, ProductRepository $commodity)
    {
        $product = ProductFlat::where('url_key', $url_key)->where('locale', App::getLocale())->first();
        $categoryId = null;
        if($product->product()->first()->categories()->first()){
            $categoryId = $product->product()->first()->categories()->first()->id;
        }
        $similarProducts = $commodity->getAll($categoryId)->sortByDesc('special_price')->take(4);

        return view('public.products.show', compact('product', 'similarProducts'));
    }

    public function byCategory(Request $request, ProductRepository $product)
    {
        $products = $product->getAll($request);
        return view('public.products.by_category', ['products' => $products, 'customClasses' => $request->customClasses ]);
    }
}
