<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Webkul\Attribute\Models\AttributeOption;
use Webkul\Attribute\Models\Attribute;
use Webkul\Product\Models\ProductFlat;
use App\Models\Content;
use Webkul\Category\Models\Category;
use Webkul\Product\Repositories\ProductRepository;

class ProductsController extends Controller
{
    public function index(Request $request, ProductRepository $product)
    {
        if(!$request->has('category') && !$request->has('type')){
            $products = $product->getAll()->sortByDesc('special_price');
        }
        $ticker = Content::where('name', 'products_ticker')->first();
        $categories = Category::where('status', 1)->get();
        $types = Attribute::where('code', 'type_of_paulownia')->first()->options()->get();
        if($request->has('category')){
            $category_id = Category::whereTranslation('slug', $request->category)->first()->id;
            $products = $product->getAll($category_id)->sortByDesc('special_price');
        }
        if($request->has('type')){
            if ($request->has('category')){
                $category_id = Category::whereTranslation('slug', $request->category)->first()->id;
            } else {
                $category_id = null;
            }
            $products = $product->getAll($category_id)->where('type_of_paulownia_label', $request->type)->sortByDesc('special_price');
        }
        return view('public.products.index', compact('products', 'ticker', 'categories', 'types'));
    }

    public function show($url_key, ProductRepository $commodity)
    {
        $product = ProductFlat::where('url_key', $url_key)->where('locale', App::getLocale())->first();
        $categoryId = $product->product()->first()->categories()->first()->id;
        $similarProducts = $commodity->getAll($categoryId)->sortByDesc('special_price')->take(4);

        return view('public.products.show', compact('product', 'similarProducts'));
    }
}
