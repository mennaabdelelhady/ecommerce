<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;



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

    function addToCart(Request $request)
    {
        $product = Products::find($request->id);
        $cart = session()->get('cart');
        if(!$cart)
        {
            $cart = [
                $request->id => [
                    "title" => $product->title,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->image
                ]
            ];
            session()->put('cart',$cart);
            return redirect()->back()->with('success','Product added to cart successfully');
        }
        if(isset($cart[$request->id]))
        {
            $cart[$request->id]['quantity']++;
            session()->put('cart',$cart);
            return redirect()->back()->with('success','Product added to cart successfully');
        }
        $cart[$request->id] = [
            "title" => $product->title,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->image
        ];
        session()->put('cart',$cart);
        return redirect()->back()->with('success','Product added to cart successfully');
    }
}
