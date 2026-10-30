<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $allProducts = ProductModel::all();
        return view('allProducts', compact('allProducts'));
    }

    public function deleteProduct($product)
    {
        $singleProduct = ProductModel::where('id', $product)->first();

        $singleProduct->delete();
        return redirect()->back();
    }

    public function singleProduct(Request $request, ProductModel $product)
    {
        return view('products/edit', compact('product'));
    }

    public function updateProduct(Request $request, ProductModel $product)
    {
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->amount = $request->input('amount');
        $product->price = $request->input('price');
        $product->save();
        return redirect('/admin/all-products');
    }
}
