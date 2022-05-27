<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $latestProducts = Product::orderBy('id', 'desc')->take(8)->get();

        return view('main.home', compact('latestProducts'));
    }
}
