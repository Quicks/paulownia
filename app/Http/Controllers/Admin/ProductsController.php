<?php

namespace App\Http\Controllers\Admin;

use Webkul\Attribute\Models\Attribute;
use Webkul\Product\Http\Controllers\ProductController;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Product;
use Illuminate\Http\Request;
use Webkul\Product\Http\Requests\ProductForm;
use App\Http\Traits\ImagesTrait;

class ProductsController extends ProductController
{
    use ImagesTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
      
        // $keyword = $request->get('search');
        $perPage = 25;
        $products = Product::latest()->paginate($perPage);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $product = new Product(['attribute_family_id' => 2]);
        $channel = 'default';
        $categories = $this->category->getCategoryFlatTree();

        $localizedAttributes = Attribute::where('value_per_locale', 1)->where('is_configurable', 0)->get();
        return view('admin.products.create', compact(['product', 'channel', 'localizedAttributes', 'categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store()
    {
        $product = $this->product->create(request()->all());
        $product = $this->product->update(request()->all(), $product->id);

        $this->saveImages($product->id, 'Product', request()->images, false);

        return redirect('admin/products')->with('flash_message', 'Slider added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $slider = Slider::findOrFail($id);

        return view('admin.slider.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $localizedAttributes = Attribute::where('value_per_locale', 1)->where('is_configurable', 0)->get();
        $categories = $this->category->getCategoryFlatTree();

        $product = Product::find($id->id);
        return view('admin.products.edit', compact('product', 'localizedAttributes', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Webkul\Product\Http\Requests\ProductForm $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductForm $request, $webkulProduct)
    {
        $product = $this->product->update(request()->all(), $webkulProduct->id);
        $this->saveImages($product->id, 'Product', request()->images, false);

        session()->flash('success', trans('admin::app.response.update-success', ['name' => 'Product']));

        return redirect('admin/products')->with('flash_message', 'Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $this->deleteAllModelImages($id);

        $id->delete();

        return redirect('admin/products')->with('flash_message', 'Product deleted!');
    }

}
