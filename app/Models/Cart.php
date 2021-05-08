<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productImages()
    {
        return $this->hasManyThrough(
            ProductImage::class, //         --> target query
            Product::class, //              --> perantara
            'id', // Product                --> key di perantara (menuju target)
            'product_id', // ProductImage   --> key di target (menuju perantara)
            'product_id', // Cart           --> key di model (menuju perantara)
            'id' // Product                 --> key perantara (primary)
        );
    }
}
