<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use App\Models\OrderDetail;
use App\Models\UserProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipping_cost',
        'product_total_amount',
        'grand_total_amount',
        'quantity_total',
        'payment_agent',
        'payment_type',
        'shipping_agent',
        'shipping_service',
        'status',
        'user_id',
        'expired_at',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_details');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
