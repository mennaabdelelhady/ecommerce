<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Cart;


class ProductsManager extends Controller
{
    function index()
    {
        $products = Products::paginate(2);
        return view('products',compact('products'));
    }

    function details($slug)
    {
        $product = Products::where('slug',$slug)->first();
        return view('details',compact('product'));
    }

    function addToCart($id)
    {
       $cart = new Cart();
       $cart->user_id = auth()->user()->id();
       $cart->product_id = $id;

    }
}
