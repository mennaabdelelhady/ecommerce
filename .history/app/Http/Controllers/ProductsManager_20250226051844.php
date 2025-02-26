<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;


class ProductsManager extends Controller
{
    function index()
    {
        $products = Products::all();
        return view('products.index',compact('products'));
    }
}
