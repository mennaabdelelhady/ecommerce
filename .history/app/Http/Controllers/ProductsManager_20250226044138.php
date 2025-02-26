<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsManager extends Controller
{
    function index()
    {
        $products = Products::all();
    }
}
