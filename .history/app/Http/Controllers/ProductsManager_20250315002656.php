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
}
