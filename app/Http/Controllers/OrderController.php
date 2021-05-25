<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function index($status = null)
    {
        $orders =  Order::with('products')->where('user_id', auth()->user()->id)->get()->sortDesc();

        if ($status !== null) {
            $orders = $orders->where('status', ucfirst($status));
        }

        return view('main.order', compact('orders'));
    }

    public function detail(Order $order)
    {
        $this->authorize('access', $order);

        $profile = auth()->user()->userProfile()->with(['province', 'city', 'subdistrict'])->get()->first();

        $items = OrderDetail::with(['product', 'productImages'])->where('order_id', $order->id)->get();

        return view('main.order-detail', compact(['order', 'profile', 'items']));
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

            return redirect()->back()->with(['type' => 'success', 'message' => 'Bukti transfer berhasil diupload.']);
        }

        return redirect()->back()->with(['type' => 'danger', 'message' => 'Terjadi kesalahan.']);
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
}
