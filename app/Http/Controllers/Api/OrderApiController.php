<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderApiController extends Controller
{
    public function index()
    {
        $orders = Order::select('id', 'created_at', 'quantity_total', 'status', 'grand_total_amount')
            ->where('user_id', auth()->user()->id)
            ->orderBy('id', 'desc')
            ->get();

        $response = [];

        foreach ($orders as $order) {
            $details = OrderDetail::where('order_id', $order->id)->get();
            $products_name = [];

            foreach ($details as $detail) {
                $products_name[] = $detail->product->name;
            }

            $response[] = [
                'order' => $order,
                'products_name' => $products_name,
            ];
        }

        return response($response);
    }

    public function detail(Order $order)
    {
        $this->authorize('access', $order);

        $detail = OrderDetail::with(['product', 'productImages'])->where('order_id', $order->id)->get();

        $response = [
            'order' => $order,
            'order_detail' => $detail,
        ];

        return response($response);
    }

    public function store(Request $request)
    {
        $request->validate([
            'shipping_cost' => 'required|integer',
            'product_total_amount' => 'required|integer',
            'grand_total_amount' => 'required|integer',
            'quantity_total' => 'required|integer',
            'payment_agent' => 'required|string',
            'payment_type' => 'required|string',
            'shipping_agent' => 'required|string',
            'shipping_service' => 'required|string',
            'status' => 'required',
            'user_id' => 'required',
            'expired_at' => 'required',
        ]);

        $order = Order::create($request->all());

        foreach ($request->order_detail as $detail) {
            OrderDetail::create([
                'quantity' => $detail['quantity'],
                'product_id' => $detail['product_id'],
                'order_id' => $order->id,
            ]);
        }

        $response = [
            'message' => 'pesanan berhasil dibuat',
        ];

        return response($response);
    }
}
