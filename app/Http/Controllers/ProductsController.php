<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Webkul\Attribute\Models\Attribute;
use Webkul\Product\Models\ProductFlat;
use App\Models\Content;
use Webkul\Category\Models\Category;
use Webkul\Product\Repositories\ProductRepository;

class ProductsController extends Controller
{
    public function index(Request $request, ProductRepository $product)
    {
        $request->request->add(['limit' => '1000']); //product pagination limit is set to 1000 products a page
        $ticker = Content::where('name', 'products_ticker')->first();
        $categories = Category::where('status', 1)->orderBy('position', 'asc')->get();
        $types = Attribute::where('code', 'type_of_paulownia')->first()->options()->get();
        $category_id = null;
        $selectedTypeId = $request->type ?? false;
        if (!$request->has('category') && !$request->has('type')) {
            $products = $product->getAll()->sortByDesc('special_price');
        }
        if ($request->has('category')) {
            if($request->category == 'all') {
                $category_id = null;
            } else {
                $category_id = Category::whereTranslation('slug', $request->category)->first()->id;
            }
        }
        if (!$request->has('type')) {
            $products = $product->getAll($category_id)->sortByDesc('special_price');
        }
        if ($request->has('type')) {
            if($request->type == 'all') {
                $products = $product->getAll($category_id)->sortByDesc('special_price');
            } else {
                $products = $product->getAll($category_id)->where('type_of_paulownia', $request->type)->sortByDesc('special_price');
            }
        }
        $minPrice = $product->all()->min('price');
        $maxPrice = $product->all()->max('price');
        if ($request->ajax()) {
            $view = view('public.products.productsData', compact('products'))->render();
            return response()->json(['html' => $view]);
        }

        return view('public.products.index', compact('products', 'ticker', 'categories', 'types', 'selectedTypeId', 'minPrice', 'maxPrice'));
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
}
