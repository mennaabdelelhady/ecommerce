<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderManger extends Controller
{
    function showCheckout()
    {
        return view('order.checkout');
    }
}
