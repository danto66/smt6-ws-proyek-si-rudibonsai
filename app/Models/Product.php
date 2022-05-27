<?php

namespace App\Models;

use App\Models\Cart;

use App\Models\ProductImage;
use App\Models\ProductCategory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'stock',
        'length',
        'width',
        'height',
        'weight',
        'description',
        'product_category_id',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
