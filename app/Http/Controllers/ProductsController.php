<?php

namespace App\Http\Controllers;

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

    public function deleteProduct($product)
    {
        $singleProduct = $this->productRepository->deleteProduct($product);
        if (is_null($singleProduct)) {
            return redirect()->back();
        }
        $singleProduct->delete();
        return redirect()->back();
    }

    public function singleProduct(Request $request, ProductModel $product)
    {
        return view('products/edit', compact('product'));
    }

    public function updateProduct(Request $request, ProductModel $product)
    {
        $this->productRepository->updateProduct($product, $request);
        return redirect('/admin/all-products');
    }
}
