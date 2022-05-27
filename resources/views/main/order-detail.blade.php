@extends('layouts.main.app')

@section('title', 'Detail Pesanan')

@section('content')
<div class="mt-6 px-2 sm:px-8 xl:px-4 max-w-7xl mx-auto min-h-screen">
    <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-pink-500 py-2">
        Detail Pesanan
    </div>

    @if (session()->has('message'))
    <div class="mt-4 w-full">
        <x-alert :type="session()->get('type')">
            <span>{{ session()->get('message') }}</span>
        </x-alert>
    </div>
    @endif

    <div class="mt-4 w-full">
        <x-alert :status="strtolower($order->status)" />
    </div>

    @if ($order->status == 'Tertunda')
    <div class="mt-4 w-full">
        <x-alert :type="'info'">
            <p>Upload <b>bukti transfer</b> sebelum <b>{{ $order->expired_at }}</b></p>
        </x-alert>
    </div>
    @endif

    {{-- body --}}
    <div class="mt-4 flex flex-col sm:flex-row sm:space-x-4">
        {{-- card bagian kiri --}}
        <div class="bg-white sm:w-8/12 shadow rounded-xl p-4">
            <div class="border-b-2 pb-3">
                <h1 class="font-semibold text-lg">
                    Alamat Pengiriman
                </h1>

                <div class="mt-1">
                    <p class="text-sm">
                        {{ $profile->fullname }}
                    </p>

                    <p class="text-sm">
                        {{ $profile->phone }}
                    </p>

                    <p class="text-sm">
                        {{ auth()->user()->email }}
                    </p>
                </div>

                <div class="mt-2">
                    <p class="text-sm">
                        <span>{{ $profile->province->province_name }}, </span>
                        <span>{{ $profile->city->city_name }}, </span>
                        <span>{{ $profile->subdistrict->subdistrict_name }}</span>
                    </p>

                    <p class="text-sm">
                        {{ $profile->address_detail }}
                    </p>
                </div>
            </div>

            <div class="mt-4 border-b-2 pb-3">
                <h1 class="font-semibold text-lg">
                    Metode Pengiriman
                </h1>

                <div class="mt-1 text-sm">
                    <x-select disabled>
                        <option>{{ strtoupper($order->shipping_agent) }}</option>
                    </x-select>
                </div>

                <div class="mt-1 text-sm">
                    <x-select disabled>
                        <option>{{ $order->shipping_service }} (@currency($order->shipping_cost))</option>
                    </x-select>
                </div>
            </div>

            <div class="mt-4 border-b-2 pb-3">
                <h1 class="font-semibold text-lg">
                    Metode Pembayaran
                </h1>

                <div class="p-2 border-2 rounded-md mt-1">
                    <p class="font-semibold text-gray-500"> Transfer Bank </p>
                    <p class="text-lg py-1 text-center rounded-md bg-green-100 font-semibold"> BRI : 098098098 </p>
                </div>
            </div>

            <div x-data="{showItem:false}" class="mt-4">
                <h1 class="font-semibold text-lg flex justify-between">
                    <span>Item</span>

                    <button @click="showItem = !showItem" class="focus:outline-none">
                        <i class="my-auto fa fa-chevron-down"
                            :class="showItem ? 'rotate-180 transform duration-300': 'rotate-0 transform duration-300'"></i>
                    </button>
                </h1>

                <div x-show.transition="showItem" class="p-2 border-2 rounded-md mt-1">
                    @foreach ($items as $item)
                    <x-main.product-list :item="$item" :qty="$item->quantity" />
                    @endforeach
                </div>
            </div>
        </div>

        {{-- card bagian kanan --}}
        <div class="bg-white block h-full mt-4 sm:mt-0 sm:w-4/12 p-4 shadow rounded-xl">
            <div class="border-b-2 pb-2">
                <div class="text-sm font-semibold  flex justify-between sm:flex-col">
                    <p class="whitespace-nowrap text-gray-400">
                        Subtotal <span>({{ $order->quantity_total }} item)</span>
                    </p>
                    <span class="text-gray-600 ml-auto">@currency($order->product_total_amount)</span>
                </div>

                <div class="sm:mt-1 text-sm font-semibold flex justify-between sm:flex-col">
                    <p class="whitespace-nowrap text-gray-400">Ongkos Kirim</p>
                    <span class="text-gray-600 ml-auto">@currency($order->shipping_cost)</span>
                </div>

                <div class="mt-2 text-sm font-bold text-black flex justify-between sm:flex-col">
                    <p>TOTAL</p>
                    <span class="sm:ml-auto">@currency($order->grand_total_amount)</span>
                </div>
            </div>

            <div class="mt-4">
                <h1 class="font-semibold text-lg">
                    Bukti Transfer
                </h1>

                <div class="mt-1">
                    @if ($order->payment_proof !== 'empty')
                    <div class="mb-4 aspect-w-16 aspect-h-9 bg-center bg-contain bg-no-repeat"
                        style="background-image: url('{{ asset('storage/img/payment-proof/') . '/' . $order->payment_proof }}')">
                    </div>
                    @endif

                    @if (\Carbon\Carbon::now()->toDateTimeString() < $order->expired_at && $order->status == 'Tertunda')
                        <div x-data="{btnDisabled : true}">
                            <form enctype="multipart/form-data" method="POST"
                                action="{{ route('main.order.upload_payment_proof', ['order' => $order->id]) }}">
                                @method('PUT')
                                @csrf

                                <x-input x-on:change="btnDisabled = false" name="payment_proof" class="w-full block"
                                    type="file" />

                                <button :class="{'disabled' : btnDisabled}" :disabled="btnDisabled" type="submit"
                                    class="btn-sm btn-primary mt-4 w-full">Submit</button>
                            </form>
                        </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection