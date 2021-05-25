@props(['item', 'qty'])

@php
$product = $item->product;
$images = $item->productImages;
@endphp

<div class="flex border-b-2 pb-2 justify-between sm:space-x-4 flex-col sm:flex-row mt-2">
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
            <h1 class="text-gray-400 font-semibold text-base leading-tight">
                {{ $product->name }}
            </h1>

            <div class="text-gray-600 font-medium text-base whitespace-nowrap mt-2">
                @currency($product->price)
            </div>

            <div class="hidden sm:flex justify-between items-center mt-2 bg-green-100 py-1 px-2 rounded-md">
                <div class="font-semibold text-sm">
                    <span class="text-green-400">x</span>
                    <span class="text-green-600">{{ $qty }}</span>
                </div>

                <div class="text-sm">
                    <span class="font-bold text-green-600">(@currency(($product->price * $qty)))</span>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-between items-center mt-2 bg-green-100 py-1 px-2 rounded-md sm:hidden">
        <div class="font-semibold text-sm">
            <span class="text-green-400">x</span>
            <span class="text-green-600">{{ $qty }}</span>
        </div>

        <div class="text-sm">
            <span class="font-bold text-green-600">(@currency(($product->price * $qty)))</span>
        </div>
    </div>
</div>
