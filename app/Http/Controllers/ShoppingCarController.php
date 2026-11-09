<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCarController extends Controller
{
    public function index()
    {
        return view('shoppingCart', [
            'cart' => Session::get('product')
        ]);
    }

    public function addToCart(CartAddRequest $request)
    {
        Session::put('product' , [
            $request->id => $request->amount
        ]);

        return redirect()->route('cartIndex');
    }
}
