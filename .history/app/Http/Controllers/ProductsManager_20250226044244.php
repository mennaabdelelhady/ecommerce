<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsManager extends Controller
{
    function index()
    {
        $products = Products::all();
        return view('products.index',compact('products'));
    }
}
