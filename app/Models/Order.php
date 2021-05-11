<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'user_id',
    ];
}
