<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;


class OrderManager extends Controller
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
        ->select(
            "cart.product_id",
        DB::raw("count (*) as quantity"),
        'products.price')
        ->join("products","cart.product_id","=","products.id")
        ->where("cart.user_id",auth()->user()->id)
        ->groupBy('cart.product_id',
        'products.price',
        )
        ->get();

        if($cartItems->isEmpty()){
            return redirect(route('cart.show'))->with('error','No items in cart');
        }


        $productIds = [];
        $quantities = [];
        $totalPrice = 0;

        foreach($cartItems as $cartItem){
            $productIds[] = $cartItem->product_id;
            $quantities[] = $cartItem->quantity;
            $totalPrice += $cartItem->price * $cartItem->quantity;
        }

        $order = new Orders();
        $order->user_id = auth()->user()->id;
        $order->address = $request->address;
        $order->pincode = $request->pincode;
        $order->phone = $request->phone;
        $order->product_id = json_encode($productIds);
        $order->total_price = $totalPrice;
        $order->quantity = json_encode($quantities);
        if($order->save()){
            DB::table("cart")->where("user_id",auth()->user()->id)->delete();
            return redirect(route('cart.show'))->with('success','Order placed successfully');
        }

        return redirect(route('cart.show'))->with('error','Failed to place order');
    }
}
