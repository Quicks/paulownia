<?php

namespace Webkul\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Event;
use Webkul\Product\Http\Requests\ProductForm;
use Webkul\Product\Repositories\ProductRepository as Product;
use Webkul\Product\Repositories\ProductAttributeValueRepository as ProductAttributeValue;
use Webkul\Attribute\Repositories\AttributeFamilyRepository as AttributeFamily;
use Webkul\Category\Repositories\CategoryRepository as Category;
use Webkul\Inventory\Repositories\InventorySourceRepository as InventorySource;
use Illuminate\Support\Facades\Storage;
use DB;
use Webkul\Product\Models\ProductFlat;
use Webkul\Product\Models\ProductImage;
use Webkul\Product\Models\ProductAttributeValue as ProductAttributeModel;

/**
 * Product controller
 *
 * @author    Jitendra Singh <jitendra@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class ProductController extends Controller
{
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * AttributeFamilyRepository object
     *
     * @var array
     */
    protected $attributeFamily;

    /**
     * CategoryRepository object
     *
     * @var array
     */
    protected $category;

    /**
     * InventorySourceRepository object
     *
     * @var array
     */
    protected $inventorySource;

    /**
     * ProductRepository object
     *
     * @var array
     */
    protected $product;

    /**
     * ProductAttributeValueRepository object
     *
     * @var array
     */
    protected $productAttributeValue;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Attribute\Repositories\AttributeFamilyRepository     $attributeFamily
     * @param  \Webkul\Category\Repositories\CategoryRepository             $category
     * @param  \Webkul\Inventory\Repositories\InventorySourceRepository     $inventorySource
     * @param  \Webkul\Product\Repositories\ProductRepository               $product
     * @param  \Webkul\Product\Repositories\ProductAttributeValueRepository $productAttributeValue
     * @return void
     */
    public function __construct(
        AttributeFamily $attributeFamily,
        Category $category,
        InventorySource $inventorySource,
        Product $product,
        ProductAttributeValue $productAttributeValue
    )
    {
        $this->attributeFamily = $attributeFamily;

        $this->category = $category;

        $this->inventorySource = $inventorySource;

        $this->product = $product;

        $this->productAttributeValue = $productAttributeValue;

        $this->_config = request('_config');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // dd($this->product->getAll());
        return view($this->_config['view']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $families = $this->attributeFamily->all();

        $configurableFamily = null;

        if ($familyId = request()->get('family')) {
            $configurableFamily = $this->attributeFamily->find($familyId);
        }

        return view($this->_config['view'], compact('families', 'configurableFamily'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if (!request()->get('family') && request()->input('type') == 'configurable' && request()->input('sku') != '') {
            return redirect(url()->current() . '?family=' . request()->input('attribute_family_id') . '&sku=' . request()->input('sku'));
        }

        if (request()->input('type') == 'configurable' && (! request()->has('super_attributes') || ! count(request()->get('super_attributes')))) {
            session()->flash('error', trans('admin::app.catalog.products.configurable-error'));

            return back();
        }

        $this->validate(request(), [
            'type' => 'required',
            'attribute_family_id' => 'required',
            'sku' => ['required', 'unique:products,sku', new \Webkul\Core\Contracts\Validations\Slug]
        ]);

        $product = $this->product->create(request()->all());

        session()->flash('success', trans('admin::app.response.create-success', ['name' => 'Product']));

        return redirect()->route($this->_config['redirect'], ['id' => $product->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product->with(['variants', 'variants.inventories'])->findOrFail($id);

        $categories = $this->category->getCategoryTree();

        $inventorySources = $this->inventorySource->all();

        return view($this->_config['view'], compact('product', 'categories', 'inventorySources'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Webkul\Product\Http\Requests\ProductForm $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductForm $request, $id)
    {
        $product = $this->product->update(request()->all(), $id);

        session()->flash('success', trans('admin::app.response.update-success', ['name' => 'Product']));

        return redirect()->route($this->_config['redirect']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->findOrFail($id);

        try {
            $this->product->delete($id);

            session()->flash('success', trans('admin::app.response.delete-success', ['name' => 'Product']));

            return response()->json(['message' => true], 200);
        } catch (\Exception $e) {
            session()->flash('error', trans('admin::app.response.delete-failed', ['name' => 'Product']));
        }

        return response()->json(['message' => false], 400);
    }

    /**
     * Mass Delete the products
     *
     * @return response
     */
    public function massDestroy()
    {
        $productIds = explode(',', request()->input('indexes'));

        foreach ($productIds as $productId) {
            $product = $this->product->find($productId);

            if (isset($product)) {
                $this->product->delete($productId);
            }
        }

        session()->flash('success', trans('admin::app.catalog.products.mass-delete-success'));

        return redirect()->route($this->_config['redirect']);
    }

    /**
     * Mass updates the products
     *
     * @return response
     */
    public function massUpdate()
    {
        $data = request()->all();

        if (!isset($data['massaction-type'])) {
            return redirect()->back();
        }

        if (!$data['massaction-type'] == 'update') {
            return redirect()->back();
        }

        $productIds = explode(',', $data['indexes']);

        foreach ($productIds as $productId) {
            $this->product->update([
                'channel' => null,
                'locale' => null,
                'status' => $data['update-options']
            ], $productId);
        }

        session()->flash('success', trans('admin::app.catalog.products.mass-update-success'));

        return redirect()->route($this->_config['redirect']);
    }

    /*
     * To be manually invoked when data is seeded into products
     */
    public function sync()
    {
        Event::fire('products.datagrid.sync', true);

        return redirect()->route('admin.catalog.products.index');
    }

    /**
     * Result of search product.
     *
     * @return \Illuminate\Http\Response
     */
    public function productLinkSearch()
    {
        if (request()->ajax()) {
            $results = [];

            foreach ($this->product->searchProductByAttribute(request()->input('query')) as $row) {
                $results[] = [
                        'id' => $row->product_id,
                        'sku' => $row->sku,
                        'name' => $row->name,
                    ];
            }

            return response()->json($results);
        } else {
            return view($this->_config['view']);
        }
    }

     /**
     * Download image or file
     *
     * @param  int $productId, $attributeId
     * @return \Illuminate\Http\Response
     */
    public function download($productId, $attributeId)
    {
        $productAttribute = $this->productAttributeValue->findOneWhere([
            'product_id'   => $productId,
            'attribute_id' => $attributeId
        ]);

        return Storage::download($productAttribute['text_value']);
    }

    public function view($id)
    {
        $product = $this->product->findOrFail($id);
        $product_flat = DB::table('product_flat')->where('product_id', $id)->get();
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
        return view($this->_config['view'], compact('product', 'product_flat', 'product_imgs', 'category'));
    }

    public function copy($id) {
        $product = $this->product->findOrFail($id);
        $products_flat = ProductFlat::where('product_id', $id)->get();
        $name_ending = '-copy-'. now()->timestamp;

        $product_copy = $product->replicate();
        $product_copy->sku = $product_copy->sku . $name_ending;
        $product_copy->save();

        foreach ($products_flat as $product_flat) {
            $product_flat_copy = $product_flat->replicate();
            $product_flat_copy->product_id = $product_copy->id;
            $product_flat_copy->sku = $product_copy->sku;
            $product_flat_copy->name = $product_flat_copy->name . '-copy';
            $product_flat_copy->url_key = $product_flat->url_key . $name_ending;
            $product_flat_copy->save();
        }

        $product_copy->categories()->saveMany($product->categories);
        $product_copy->attribute_values()->createMany($product->attribute_values->toArray());

        $url_key_id = \Webkul\Attribute\Models\Attribute::where('code', 'url_key')->first()->id;
        $url_key_attr_fix = $product_copy->attribute_values->where('attribute_id', $url_key_id)->first();
        $url_key_attr_fix->text_value = $product_flat_copy->url_key;
        $url_key_attr_fix->save();

        // $product_copy->images()->createMany($product->images->toArray()); //add image file copying if needed

        return redirect()->route('admin.catalog.products.index');
    }

}