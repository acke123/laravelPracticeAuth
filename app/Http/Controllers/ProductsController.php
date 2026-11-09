<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProductRequest;
use App\Models\ProductModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $productRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }

    public function index()
    {
        $allProducts = ProductModel::all();
        return view('allProducts', compact('allProducts'));
    }

    public function deleteProduct(ProductModel $product)
    {
        $product->delete();
        return redirect()->back();
    }

    public function singleProduct(ProductModel $product)
    {
        return view('products/edit', compact('product'));
    }

    public function updateProduct(EditProductRequest $request, ProductModel $product)
    {
        $this->productRepository->updateProduct($product, $request);
        return redirect('/admin/all-products');
    }

    public function permaLink(ProductModel $product)
    {
        return view('products.permalink', compact('product'));
    }
}
