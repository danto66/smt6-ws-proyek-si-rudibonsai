<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('productImages')->paginate(8);
        $categories = ProductCategory::all();

        return view('main.product', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = Product::with('productImages')->find($id);

        if ($product->stock < 1) {
            return redirect()->route('main.products.index');
        }

        return view('main.product-show', compact('product'));
    }

    public function search(Request $request)
    {
        if ($request->keyword_product == '') {
            return redirect()->route('main.products.index');
        }

        $products = Product::with('productImages')
            ->where('name', 'LIKE', '%' . $request->keyword_product . '%')
            ->get();

        $keyword = $request->keyword_product;

        $categories = ProductCategory::all();

        return view('main.product', compact('products', 'keyword', 'categories'));
    }

    public function getByCategory($category)
    {
        $products = Product::with('productImages')
            ->where('product_category_id', $category)
            ->paginate(8);

        $categories = ProductCategory::all();

        return view('main.product', compact('products', 'categories'));
    }
}
