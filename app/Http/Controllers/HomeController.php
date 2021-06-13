<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $latestProducts = Product::latest()->take(8)->get();

        return view('main.home', compact('latestProducts'));
    }
}
