<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('productImages')->paginate(8);

        return view('main.product', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with('productImages')->find($id);

        if ($product->stock < 1) {
            return redirect()->route('main.products.index');
        }

        return view('main.products-show', compact('product'));
    }
}
