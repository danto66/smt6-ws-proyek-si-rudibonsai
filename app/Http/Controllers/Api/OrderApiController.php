<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class OrderApiController extends Controller
{
    public function index()
    {
        $query = Order::select('id', 'created_at', 'quantity_total', 'status', 'grand_total_amount', 'expired_at', 'payment_proof')
            ->where('user_id', auth()->user()->id)
            ->orderBy('id', 'desc')
            ->get();

        $orders = $query->filter(function ($item) {
            if ($item->status == 'Tertunda') {
                if (Carbon::now()->toDateTimeString() < $item->expired_at || $item->payment_proof != 'empty') {
                    return $item;
                }
            } else {
                return $item;
            }
        });

        $orders->all();

        $response = [];

        foreach ($orders as $order) {
            $details = OrderDetail::where('order_id', $order->id)->get();
            $products_name = [];

            foreach ($details as $detail) {
                $products_name[] = $detail->product->name;
            }

            unset($order->expired_at);
            unset($order->payment_proof);

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

            $product = Product::find($detail['product_id']);
            $product->stock = $product->stock - $detail['quantity'];
            $product->save();

            if ($product->stock < 1) {
                Cart::where('product_id', $detail['product_id'])->delete();
            }
        }

        $response = [
            'message' => 'Pesanan berhasil dibuat',
        ];

        return response($response);
    }

    public function uploadPaymentProof(Request $request, Order $order)
    {
        $this->authorize('access', $order);

        if ($request->hasFile('payment_proof')) {
            $file = $request->file('payment_proof');

            $image = $this->storeImage($file);

            if ($order->payment_proof !== 'empty') {
                $imageOld = $order->payment_proof;
                $path = 'public/img/payment-proof/';
                $filename = $path . $imageOld;

                Storage::disk('local')->delete($filename);
            }

            $order->payment_proof = $image;
            $order->save();

            return response(['message' => 'Bukti transfer berhasil diupload.']);
        }

        return response(['message' => 'Terjadi kesalahan.'], 442);
    }

    public function storeImage($file)
    {
        $name = rand(1000, 9999);
        $time = time();
        $extension = $file->getClientOriginalExtension();
        $newName = $time . $name  . '.' . $extension;

        Storage::putFileAs('public/img/payment-proof', $file, $newName);

        return $newName;
    }

    public function getPaymentProof($filename)
    {
        $path = 'public/img/payment-proof/' . $filename;

        if (!Storage::exists($path)) {
            abort(404);
        }

        return Storage::disk('local')->response($path);
    }
}
