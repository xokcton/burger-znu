<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Product;
use App\Http\Requests\StoreOrder;
use App\Order;
use App\OrderItems;
use App\Mail\OrderClass;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $product = Product::find($request->product_id);
        $cart = new CartService();
        $cart->add($product, (int)$request->qty);

        return view('shop._cart');
    }

    public function clear()
    {
        CartService::clear();
        return view('shop._cart');
    }

    public function remove(Request $request)
    {
        CartService::remove((int)$request->product_id);
        return view('shop._cart');
    }

    public function checkout()
    {
        return view('shop.checkout');
    }

    public function endCheckout(StoreOrder $request)
    {
        $order = new Order();
        $order->name = $request->name;
        $order->street = $request->street;
        $order->total_sum = session('totalSum');
        $order->save();

        foreach (session('cart') as $product) {
            $item = new OrderItems();
            $item->name = $product['name'];
            $item->img = $product['img'];
            $item->price = $product['price'];
            $item->qty = $product['qty'];
            $item->order_id = $order->id;
            $item->save();
        }

        Mail::to('denislevch2023@gmail.com')->send(new OrderClass($order->name, $order->street, $order->total_sum, $order->id));

        CartService::clear();
        return redirect('/checkout')->with('success', 'We\'ve got ur order!');
    }
}
