<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Models\ProductModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    private $productRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }
    public function index()
    {
        $products = ProductModel::all();
        return view('shop', compact('products'));
    }

    public function storeProduct(SaveProductRequest $request)
    {
        $imageName = '';
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $imageName);
        }

        $this->productRepository->createNew($request, $imageName);
        return redirect('/admin/all-products')->with('success', 'Product added successfully!');
    }
}
