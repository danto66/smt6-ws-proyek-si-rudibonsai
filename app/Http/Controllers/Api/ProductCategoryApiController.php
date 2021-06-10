<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryApiController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();

        return response($categories);
    }

    public function show(ProductCategory $category)
    {
        return response($category);
    }
}
