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
        $order = new Cart();
    }
}
