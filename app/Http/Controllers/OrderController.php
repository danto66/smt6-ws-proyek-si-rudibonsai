<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function index($status = null)
    {
        $query =  Order::with('products')
            ->where('user_id', auth()->user()->id)
            ->when($status, function ($q, $status) {
                return $q->where('status', ucfirst($status));
            })
            ->get()
            ->sortDesc();

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

        return view('main.order', compact('orders'));
    }

    public function detail(Order $order)
    {
        $this->authorize('access', $order);

        $profile = auth()->user()->userProfile()->with(['province', 'city', 'subdistrict'])->get()->first();

        $items = OrderDetail::with(['product'])->where('order_id', $order->id)->get();

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
                $path = 'storage/img/payment-proof/';
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

        Storage::putFileAs('storage/img/payment-proof', $file, $newName);

        return $newName;
    }
}
