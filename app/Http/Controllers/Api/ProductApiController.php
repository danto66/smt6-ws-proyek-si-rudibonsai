<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ProductApiController extends Controller
{
    public function index()
    {
        $products = Product::with('productCategory', 'productImages')
            ->where('stock', '>', 0)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return response($products);
    }

    public function show(Product $product)
    {
        $product->productCategory;
        $product->productImages;

        return response($product);
    }

    public function showImage($filename)
    {
        $path = 'storage/img/products/' . $filename;

        if (!Storage::exists($path)) {
            abort(404);
        }

        return Storage::disk('local')->response($path);
    }
}
