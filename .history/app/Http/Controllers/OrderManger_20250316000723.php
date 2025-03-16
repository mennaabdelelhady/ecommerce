<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;


class OrderManger extends Controller
{
    function showCheckout()
    {
        return view('checkout');
    }

    function checkoutPost(Request $request)
    {

        $request->validate([
            'address' => 'required',
            'pincode' => 'required',
            'phone' => 'required',
        ]);

        $cartItems = DB::table("cart")
        ->join("products","cart.product_id","=","products.id")
        ->select("cart.product_id",DB::raw("count(*)as quantity"),
        'products.title','products.price','products.image','products.slug')
        ->where("cart.user_id",auth()->user()->id)
        ->groupBy("cart.product_id","products.title","products.price",
        'products.image','products.slug')
        ->paginate(5); $cartItems = DB::table("cart")
        ->join("products","cart.product_id","=","products.id")
        ->select("cart.product_id",DB::raw("count(*)as quantity"),
        'products.title','products.price','products.image','products.slug')
        ->where("cart.user_id",auth()->user()->id)
        ->groupBy("cart.product_id","products.title","products.price",
        'products.image','products.slug')
        ->paginate(5);

        $order = new Orders();
        $order->user_id = auth()->user()->id;
        $order->address = $request->address;
        $order->pincode = $request->pincode;
        $order->phone = $request->phone;
        $order->product_id=;
        $order->total_price=;
        $order->quantity=;
        if($order->save()){
            return redirect('cart.show')->with('success','Order placed successfully');
        }

        return redirect('cart.show')->with('error','Failed to place order');
    }
}
