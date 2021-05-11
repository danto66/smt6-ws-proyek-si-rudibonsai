@extends('layouts.main.app')

@section('content')
    <div x-data="countCart()" x-init="setItemValue({{ $carts->count() }}); setData({{ $carts }})"
        class="mt-6 px-2 sm:px-8 xl:px-4 max-w-7xl mx-auto min-h-screen">
        <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-green-500 py-2">
            Keranjang
        </div>

        @if (session()->has('message'))
            <div class="mt-6 w-full">
                <x-alert>
                    <span>{{ session()->get('message') }}</span>
                </x-alert>
            </div>
        @endif

        {{-- body --}}
        <div class="mt-6 flex flex-col sm:flex-row sm:space-x-4">
            <div class="bg-white sm:w-8/12 shadow rounded-xl px-4 pb-4">
                {{-- item keranjang --}}
                @foreach ($carts as $cart)
                    <x-main.cart-item :cart="$cart" :val="$loop->index" />
                @endforeach
            </div>

            <div class="bg-white block h-full mt-4 sm:mt-0 sm:w-4/12 p-4 shadow rounded-xl">
                <div class="border-b-2 pb-2">
                    <div class="text-gray-600 text-sm">
                        <span class="font-semibold text-gray-400">Total Item :</span>

                        <span x-text="totalItem()"></span>
                    </div>

                    <div class="mt-2 flex sm:flex-col justify-between">
                        <h1 class="text-gray-600 font-bold text-xl">Total :</h1>

                        <h1 class="text-gray-900 font-bold text-xl whitespace-nowrap ml-auto">
                            <span x-text="subtotalPrice()"></span>
                        </h1>
                    </div>
                </div>

                <div class="xl:flex xl:flex-row xl:space-x-2">
                    <form method="POST" action="{{ route('main.checkout') }}">
                        @csrf
                        @foreach ($carts as $cart)
                            <x-input x-model.number="items[{{ $loop->index }}]" type="hidden" name="qty[]" />
                        @endforeach

                        <input type="hidden" name="total_item" x-model.number="totalItem()">
                        <input type="hidden" name="subtotal" x-model.number="subtotal">
                        <input type="hidden" name="total_weight" x-model.number="totalWeight()">

                        <button type="submit" class="mt-4 w-full btn-sm btn-green hover-darken-green">Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function countCart() {
            return {
                items: [],
                prices: [],
                weight: [],
                subtotal: null,
                totalItem() {
                    let totalItem = 0;
                    this.items.forEach(i => {
                        totalItem += i
                    });

                    return totalItem;
                },
                setItemValue(num) {
                    for (let i = 0; i < num; i++) {
                        this.items.push(1);
                    }
                },
                setData(data) {
                    data.forEach(item => {
                        this.prices.push(item.product.price);
                        this.weight.push(item.product.weight);
                    });
                },
                subtotalPrice() {
                    let subtotal = 0;
                    this.prices.forEach((item, i) => {
                        subtotal += this.items[i] * item;
                    });

                    this.subtotal = subtotal;

                    return new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                    }).format(subtotal);
                },
                totalWeight() {
                    let totalWeight = 0;
                    this.weight.forEach((item, i) => {
                        totalWeight += this.items[i] * item;
                    });

                    return totalWeight;
                }
            }
        }

    </script>

@endsection
