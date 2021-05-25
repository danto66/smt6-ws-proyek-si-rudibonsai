<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Address\Province;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $profile = auth()->user()->userProfile()->with(['province', 'city', 'subdistrict'])->get()->first();

        $items = Cart::with(['product', 'productImages'])->where('user_id', auth()->user()->id)->get();

        $cart_data = $request->all();

        return view('main.checkout', compact(['profile', 'items', 'cart_data']));
    }

    public function store(Request $request)
    {
        $query = $request->except('qty');
        $qty = $request->only('qty');

        $query += [
            'payment_agent' => 'BRI',
            'payment_type' => 'TRANSFER BANK',
            'user_id' => auth()->user()->id,
            'status' => 'Tertunda',
            'expired_at' => Carbon::now()->addHours(24),
        ];

        $order = Order::create($query);
        $items = Cart::where('user_id', auth()->user()->id)->get();

        foreach ($items as $i => $item) {
            OrderDetail::create([
                'quantity' => $qty['qty'][$i],
                'product_id' => $item->product_id,
                'order_id' => $order->id,
            ]);

            $product = Product::find($item->product_id);
            $product->stock = $product->stock -  $qty['qty'][$i];
            $product->save();

            if ($product->stock < 1) {
                Cart::find($item->id)->delete();
            }
        }

        return redirect()->route('main.order.detail', ['order' => $order->id])->with(['type' => 'success', 'message' => 'Pesanan berhasil dibuat.']);
    }
}
