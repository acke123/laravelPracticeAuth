<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCarController extends Controller
{
    public function index()
    {
        //Session::forget('product');
        return view('shoppingCart', [
            'cart' => Session::get('product')
        ]);
    }

    public function addToCart(CartAddRequest $request)
    {
        $product = ProductModel::find($request->id);
        if ($product->amount < $request->amount) {
            return redirect()->back();
        }
        Session::push('product', [
            'productId' => $request->id,
            'amount' => $request->amount,
            'productName' => $product->name,
            'productPrice' => $product->price,
        ]);

        return redirect()->route('cartIndex');
    }
}
