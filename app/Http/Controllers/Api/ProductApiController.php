<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function index()
    {
        $products = Product::with('productCategory', 'productImages')->orderBy('id', 'desc')->paginate(10);

        return response($products);
    }

    public function show(Product $product)
    {
        $product->productCategory;
        $product->productImages;

        return response($product);
    }
}
