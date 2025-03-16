<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $order = new Orders();
        $order->user_id = auth()->user()->id;
        $order->address = $request->address;
        $order->pincode = $request->pincode;
        $order->phone = $request->phone;
        $order->product_id=;
        $order->total_price=;
        $order->quantity=;
        if($order->save()){
            return redirect('home');
        }
    }
}
