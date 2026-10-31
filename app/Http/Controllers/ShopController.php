<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = ProductModel::all();
        return view('shop', compact('products'));
    }

    public function storeProduct(request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:products',
            'description' => 'required|string',
            'amount' => 'required|integer',
            'price' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $imageName = 'test';
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $imageName);
        }

        ProductModel::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'amount' => $request['amount'],
            'price' => $request['price'],
            'image' => $imageName,
        ]);
        return redirect('/admin/all-products')->with('success', 'Product added successfully!');
    }
}
