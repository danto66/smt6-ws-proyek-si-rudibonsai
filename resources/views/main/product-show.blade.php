@extends('layouts.main.app')

@section('title', 'Detail Produk')

@section('content')
<div class="mt-6 px-2 sm:px-8 xl:px-4 max-w-7xl mx-auto min-h-screen">
    <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-green-500 py-2">
        Detail Produk
    </div>

    @if (session()->has('message'))
    <div class="mt-6 w-full">
        <x-alert :type="session()->get('type')">
            <span>{{ session()->get('message') }}</span>
        </x-alert>
    </div>
    @endif

    {{-- body --}}
    <div class="mt-4 flex flex-col sm:flex-row sm:space-x-4">
        {{-- card bagian kiri --}}
        <div class="bg-white sm:w-8/12 shadow rounded-xl">
            <div x-data="{i: 0 ,data:{{ $product->productImages->sortByDesc('is_primary')->values() }}, name:null, active:false}"
                x-init="name=data[i].name;" class="relative w-full rounded-t-xl">
                <div class="aspect-w-16 aspect-h-9 bg-center bg-cover rounded-t-xl"
                    :style="`background-image: url('{{ asset('/storage/img/products') }}/${name}')`">
                </div>

                {{-- load cache image --}}
                <div class="hidden">
                    <template x-for="item in data">
                        <img :src="`{{ asset('/storage/img/products') }}/${item.name}`">
                    </template>
                </div>

                <div class="flex justify-between items-center absolute bottom-0 w-full  opacity-50">
                    <button x-on:click="i > 0 ? i-- : ''; name = data[i].name;"
                        class="bg-white border-2 py-1 px-3 hover:bg-gray-300">
                        <i class="fa fa-chevron-left"></i>
                    </button>

                    <div class="flex justify-center space-x-2">
                        <template x-for="(item, index) in data" :key="index">
                            <button x-on:click="i = index; name = data[i].name" class="my-auto">
                                <i :class="{'text-green-700 cursor-default': (i == index ? true : false)}"
                                    class="text-white fa fa-circle "></i>
                            </button>
                        </template>
                    </div>

                    <button x-on:click="i < (data.length - 1) ? i++ : ''; name = data[i].name;"
                        class="bg-white border-2 py-1 px-3 hover:bg-gray-300">
                        <i class="fa fa-chevron-right"></i>
                    </button>
                </div>
            </div>

            <div class="p-4">
                <h1 class="text-gray-700 font-bold text-lg">
                    {{ $product->name }}
                </h1>

                <div class="mt-1 text-gray-600 text-sm">
                    <span class="font-semibold text-gray-400">Dimensi :</span>

                    <span>{{ $product->length }}cm x {{ $product->width }}cm x {{ $product->height }}cm</span>
                </div>

                <div class="mt-1 text-gray-600 text-sm">
                    <span class="font-semibold text-gray-400">Berat :</span>

                    <span>{{ $product->weight }} gram</span>
                </div>

                <div class="inline-block mt-2 py-1 px-2 bg-gray-200 rounded-full font-semibold text-gray-500 text-xs">
                    {{ $product->productCategory->name }}
                </div>

                <div class="mt-4">
                    {{ $product->description }}
                </div>
            </div>
        </div>

        {{-- card bagian kanan --}}
        <div class="bg-white block h-full mt-4 sm:mt-0 sm:w-4/12 p-4 shadow rounded-xl">
            <div class="border-b-2 pb-2">
                <h1 class="text-gray-900 font-bold text-xl">@currency($product->price)</h1>

                <div class="mt-2 text-gray-600 text-sm">
                    <span class="font-semibold text-gray-400">Stok :</span>
                    <span>{{ $product->stock }}</span>
                </div>
            </div>

            @guest
            <x-alert class="w-full" :type="'warning'">
                <span>Silahkan login / masuk terlebih dahulu untuk dapat melakukan transaksi.</span>
            </x-alert>
            @endguest

            @auth
            @if (auth()->user()->carts->where('product_id', $product->id)->isEmpty())
            <div class="xl:flex flex-col">
                <form method="POST" action="{{ route('main.cart.buy_now', ['product' => $product->id]) }}">
                    @csrf
                    <button type="submit" class="mt-4 w-full btn-sm btn-outline-primary hover-primary">Beli
                        Sekarang</button>
                </form>

                <form method="POST" action="{{ route('main.cart.add_to_cart', ['product' => $product->id]) }}">
                    @csrf
                    <button type="submit" class="mt-4 w-full btn-sm btn-primary hover-darken-primary">Tambah
                        Keranjang</button>
                </form>
            </div>
            @else
            <x-alert class="w-full" :type="'info'">
                Produk sudah ada di keranjang.
            </x-alert>
            @endif
            @endauth
        </div>
    </div>
</div>

@endsection