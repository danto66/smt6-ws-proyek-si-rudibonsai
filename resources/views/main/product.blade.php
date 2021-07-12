@extends('layouts.main.app')

@section('title', 'Produk')

@section('content')
    <div class="min-h-screen mt-6 px-2 sm:px-8 xl:px-4 max-w-7xl mx-auto">
        <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-green-500 py-2">
            Produk
        </div>

        <div class="sm:w-2/3 sm:mx-auto mt-4 flex justify-center space-x-2">
            <form class="w-full" method="POST" action="{{ route('main.products.search') }}">
                @csrf
                <div x-data="{searchHover:false}" :class="{'bg-green-700' : searchHover}"
                    class="h-full flex flex-auto justify-center bg-green-400 rounded-md ">
                    <x-input :value="request()->routeIs('main.products.search') ? $keyword: ''"
                        placeholder="Cari tanaman apa?" class="w-full" type="search" name="keyword_product"
                        id="keyword_product" />

                    <button type="submit" @mouseOver="searchHover = true" @mouseOut="searchHover = false" class="px-3">
                        <i class="text-white fa fa-search"></i>
                    </button>
                </div>
            </form>

            <div x-data="{open : false}" class="relative">
                <button @click="open = true" class="px-4 py-3 rounded-md bg-green-400 text-white hover:bg-green-700">
                    <i class="fa fa-filter"></i>
                </button>

                <div x-show="open" @click.away="open = false"
                    class="z-10 top-12 py-2 w-48 max-h-48 overflow-y-auto right-0 rounded absolute shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                    @foreach ($categories as $category)
                        <a href=" {{ route('main.products.get_by_category', ['category' => $category->id]) }} "
                            class="menu menu-hover dropdown-item block text-sm font-medium ">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>

        @if ($products->count() < 1)
            <div class="mt-6 flex justify-center w-full bg-white p-8 rounded shadow">
                <img class="h-48" src="{{ asset('/img/empty.svg') }}" alt="">
            </div>
        @else
            <div class="mt-6 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 sm:gap-4">
                @foreach ($products as $product)
                    <x-main.product-card :product="$product" />
                @endforeach
            </div>

            @if (!request()->routeIs('main.products.search'))
                <div class="mt-6">{{ $products->links() }}</div>
            @endif
        @endif

    </div>
@endsection
