@extends('layouts.admin.app')

@section('title', 'Detail Pesanan')

@section('content')

@if (session()->has('message'))
<div class="mt-4 w-full">
    <x-alert :type="session()->get('type')">
        <span>{{ session()->get('message') }}</span>
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
            @if ($order->status == 'Selesai' || $order->status == 'Batal')
            <x-alert :status="strtolower($order->status)" />
            @else
            <h1 class="font-semibold text-lg">
                Bukti Transfer
            </h1>

            <div class="mt-2">
                @if ($order->payment_proof !== 'empty')
                <div class="mb-4 aspect-w-16 aspect-h-9 bg-center bg-contain bg-no-repeat"
                    style="background-image: url('{{ asset('storage/img/payment-proof/') . '/' . $order->payment_proof }}')">
                </div>
                @endif

                <div class="mt-2">
                    @if ($order->payment_proof == 'empty')
                    <x-alert :type="'danger'">
                        <span>Ubah status menjadi Batal</span>
                    </x-alert>
                    @else
                    <x-alert :status="strtolower($order->status)" :newMsg="('Ubah status menjadi ') . $nextStatus" />
                    @endif
                </div>

                <div>
                    <form method="POST" action="{{ route('admin.order.update_status', ['order' => $order->id]) }}">
                        @method('PUT')
                        @csrf

                        @if ($order->payment_proof == 'empty')
                        <input type="hidden" name="next_status" value="Batal">

                        <button onclick="return confirm('Batalkan pesanan?')" type="submit"
                            class="btn-sm btn-red mt-2 w-full">Batalkan</button>
                        @else
                        <input type="hidden" name="next_status" value="{{ $nextStatus }}">

                        <button onclick="return confirm('Ubah status pesanan menjadi {{ $nextStatus }}?')" type="submit"
                            class="btn-sm btn-primary mt-2 w-full">Konfirmasi</button>
                        @endif
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection