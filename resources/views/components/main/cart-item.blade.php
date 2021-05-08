@props(['val', 'cart'])

@php
$product = $cart->product;
$images = $cart->productImages;
@endphp

<div class="flex border-b-2 pb-2 mt-6 justify-between sm:space-x-4 flex-col sm:flex-row">
    <div class="flex justify-items-start items-start sm:items-center w-full">
        <div class="w-32">
            @if ($images->where('is_primary', 1)->isNotEmpty())
                <div class="aspect-w-16 aspect-h-9 bg-center bg-cover"
                    style="background-image: url('{{ asset('storage/img/products/') . '/' . $images->where('is_primary', 1)->first()->name }}')">
                </div>
            @else
                <div class="aspect-w-16 aspect-h-9 bg-center bg-cover"
                    style="background-image: url('{{ asset('storage/img/products/') . '/' . $images->first()->name }}')">
                </div>
            @endif
        </div>

        <div class="overflow-x-auto ml-3 w-full">
            <h1 class="text-gray-600 font-semibold text-base leading-tight">
                {{-- Lorem ipsum dolor sit. --}}
                {{ $product->name }}
            </h1>

            <div class="text-gray-900 font-bold text-base whitespace-nowrap">
                {{-- Rp 220.000.000 --}}
                @currency($product->price)
            </div>

            <div class=" text-gray-600 text-sm whitespace-nowrap hidden sm:mt-2 sm:block">
                <span class="font-semibold text-gray-400">Stok :</span>
                {{-- <span>40</span> --}}
                <span>{{ $product->stock }}</span>
            </div>
        </div>
    </div>

    <div class="flex justify-between items-center mt-4 flex-wrap sm:mt-0 w-full sm:w-4/12">
        <div class=" text-gray-600 text-sm flex-1 whitespace-nowrap sm:hidden">
            <span class="font-semibold text-gray-400">Stok :</span>
            {{-- <span>40</span> --}}
            <span>{{ $product->stock }}</span>
        </div>

        <div class="flex justify-between sm:space-x-3 flex-1">
            <x-input min="1" max="{{ $product->stock }}" x-model.number="items[{{ $val }}]"
                x-bind:value="items[{{ $val }}]" class="block w-16 h-10 pr-2" type="number" name="qty[]" />

            <form method="POST" action="{{ route('main.cart.destroy', ['cart' => $cart->id]) }}">
                @method('DELETE')
                @csrf
                <button><i class="fa fa-trash text-red-500"></i></button>
            </form>
        </div>
    </div>
</div>
