<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Product\ProductServiceInterface;
use App\Services\ProductBrand\ProductBrandServiceInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;
    private $brandService;
    private $productCategoryService;

    public function __construct(ProductServiceInterface $productService, ProductBrandServiceInterface $brandService, ProductCategoryServiceInterface $productCategoryService)
    {
        $this->productService = $productService;
        $this->brandService = $brandService;
        $this->productCategoryService = $productCategoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = $this->productService->searchAndPaginate('name', $request->get('search'));
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = $this->brandService->all();
        $categories = $this->productCategoryService->all();
        return view('admin.product.create', compact('brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'color' => 'required|string',
            'size' => 'required|string',
            'name' => 'required|string',
            'quantity' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:1000',
            'tag' => 'required|string',
            'description' => 'required',
        ]);
        $product = $this->productService->create($data);
        return redirect('admin/product/' . $product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->productService->find($id);
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productService->find($id);

        $brands = $this->brandService->all();
        $productCategories = $this->productCategoryService->all();

        return view('admin.product.edit', compact('product', 'brands', 'productCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'color' => 'required|string',
            'size' => 'required|string',
            'name' => 'required|string',
            'quantity' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:1000',
            'tag' => 'required|string',
            'description' => 'required',
        ]);
        $this->productService->update($data, $id);

        return redirect('admin/product/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productService->delete($id);

        return redirect('admin/product');
    }
}
