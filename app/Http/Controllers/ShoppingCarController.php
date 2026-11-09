<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\OrderItemsModel;
use App\Models\OrdersModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCarController extends Controller
{
    public function index()
    {
        $cart = Session::get('product');
        if (count($cart) < 0) {
            return redirect('/');
        }
        return view('shoppingCart', [
            'cart' => $cart
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

    public function finishOrder()
    {
        $cart = Session::get('product');
        $totalCartPrice = 0;
        foreach ($cart as $item) {
            $product = ProductModel::firstWhere('id', $item['productId']);
            if ($item['amount'] > $product->amount) {
                return redirect()->back();
            }
            $totalCartPrice += $product->price * $item['amount'];

        }
        $order = OrdersModel::create([
            'user_id' => \Auth::id(),
            'price' => $totalCartPrice,
        ]);

        foreach ($cart as $item) {
            $product = ProductModel::firstWhere('id', $item['productId']);
            $product->amount -= $item['amount'];
            $product->save();

            OrderItemsModel::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'amount' => $item['amount'],
                'price' => $item['amount'] * $product->price,
            ]);
        }
        Session::remove('product');
        return redirect('/thankYou');
    }
}
