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
        $allProducts = $product->getAll()->get();
        $products = $product->getAll(['sort' => 'created_at', 'order' => 'desc'])->paginate(isset($params['limit']) ? $params['limit'] : 9);
        return view('public.products.index', compact('products', 'allProducts'));
    }

    public function show($url_key, ProductRepository $productRepository)
    {
        
        $product = $productRepository->findBySlugOrFail($url_key);
        $categoryId = null;
        if($product->product()->first()->categories()->first()){
            $categoryId = $product->product()->first()->categories()->first()->id;
        }
        $similarProducts = $productRepository->getAll($categoryId)->sortByDesc('special_price')->take(4);

        return view('public.products.show', compact('product', 'similarProducts'));
    }

    public function byCategory(Request $request, ProductRepository $product)
    {
        $products = $product->getAll($request)->paginate(isset($params['limit']) ? $params['limit'] : 9);
        return view('public.products.by_category', ['products' => $products, 'customClasses' => $request->customClasses ]);
    }
}
