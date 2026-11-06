<?php

namespace App\Repositories;

use App\Models\ProductModel;

class ProductRepository
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function createNew($request, $imageName)
    {
        $this->productModel->create(
            [
                'name' => $request['name'],
                'description' => $request['description'],
                'amount' => $request['amount'],
                'price' => $request['price'],
                'image' => $imageName,
            ]);
    }

    public function updateProduct($product, $request)
    {
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->amount = $request->input('amount');
        $product->price = $request->input('price');
        $product->save();
    }
}
