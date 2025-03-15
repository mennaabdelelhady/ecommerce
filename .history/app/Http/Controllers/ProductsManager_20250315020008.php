<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;


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
       $cart->user_id = auth()->user()->id;
       $cart->product_id = $id;
       if($cart->save())
       {
        return redirect()->back()->with('success','Product added to cart successfully');
       }
          return redirect()->back()->with('error','Failed to add product to cart');

    }
    function showCart()
    {
        $cartItems = DB::table("cart")->select("product_id",DB::raw("count(*)"))->get();
        return view('cart',compact('cart'));
    }
}
