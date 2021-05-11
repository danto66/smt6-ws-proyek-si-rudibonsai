@extends('layouts.main.app')

@section('title', 'Produk')

@section('content')
    <div class="mt-6 px-2 sm:px-8 xl:px-4 max-w-7xl mx-auto">
        <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-green-500 py-2">
            Produk
        </div>

        <div class="sm:w-2/3 sm:mx-auto mt-4 flex justify-center space-x-2">
            <div x-data="{searchHover:false}" :class="{'bg-green-700' : searchHover}"
                class="flex flex-auto justify-center bg-green-400 rounded-md ">
                <x-input placeholder="Cari tanaman apa?" class="w-full" type="search" name="search_product"
                    id="search_product" />
                <button @mouseOver="searchHover = true" @mouseOut="searchHover = false" class="px-3">
                    <i class="text-white fa fa-search"></i>
                </button>
            </div>

            <div>
                <button class="px-4 py-3 rounded-md bg-green-400 text-white hover:bg-green-700"><i
                        class="fa fa-filter"></i></button>
            </div>
        </div>

        <div class="mt-6 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 sm:gap-4">
            @foreach ($products as $product)
                <x-main.product-card :product="$product" />
            @endforeach
        </div>

        <div class="mt-6">{{ $products->links() }}</div>

    </div>
@endsection
