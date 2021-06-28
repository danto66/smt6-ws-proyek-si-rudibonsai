<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            'shipping_agent' => 'required|string',
            'shipping_service' => 'required|string',
        ]);

        $order = Order::create([
            'shipping_cost' => $request->shipping_cost,
            'product_total_amount' => $request->product_total_amount,
            'grand_total_amount' => $request->grand_total_amount,
            'quantity_total' => $request->quantity_total,
            'payment_agent' => 'BRI',
            'payment_type' => 'TRANSFER BANK',
            'shipping_agent' => $request->shipping_agent,
            'shipping_service' => $request->shipping_service,
            'status' => 'Tertunda',
            'user_id' => auth()->user()->id,
            'expired_at' => Carbon::now()->addHours(24),
        ]);

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
