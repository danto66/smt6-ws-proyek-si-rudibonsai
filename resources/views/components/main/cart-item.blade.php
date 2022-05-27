@props(['val', 'cart'])

@php
$product = $cart->product;
@endphp

<div class="flex border-b-2 pb-2 mt-6 justify-between sm:space-x-4 flex-col sm:flex-row">
    <div class="flex justify-items-start items-start sm:items-center w-full">
        <div class="w-32">
            @if ($product->productImages->where('is_primary', 1)->isNotEmpty())
            <div class="aspect-w-16 aspect-h-9 bg-center bg-cover"
                style="background-image: url('{{ asset('storage/img/products/') . '/' . $product->productImages->where('is_primary', 1)->first()->name }}')">
            </div>
            @else
            <div class="aspect-w-16 aspect-h-9 bg-center bg-cover"
                style="background-image: url('{{ asset('storage/img/products/') . '/' . $product->productImages->first()->name }}')">
            </div>
            @endif
        </div>

        <div class="overflow-x-auto ml-3 w-full">
            <h1 class="text-gray-600 font-semibold text-base leading-tight">
                {{ $product->name }}
            </h1>

            <div class="text-gray-900 font-bold text-base whitespace-nowrap">
                @currency($product->price)
            </div>

            <div class=" text-gray-600 text-sm whitespace-nowrap hidden sm:mt-2 sm:block">
                <span class="font-semibold text-gray-400">Stok :</span>
                <span>{{ $product->stock }}</span>
            </div>
        </div>
    </div>

    <div class="flex justify-between items-center mt-4 flex-wrap sm:mt-0 w-full sm:w-4/12">
        <div class=" text-gray-600 text-sm flex-1 whitespace-nowrap sm:hidden">
            <span class="font-semibold text-gray-400">Stok :</span>
            <span>{{ $product->stock }}</span>
        </div>

        <div class="flex justify-between sm:space-x-3 flex-1">
            @if ($product->stock
            < 1) <x-input type="number" class="block w-16 h-10 pr-2 disabled" :value="$product->stock" disabled />
            @else
            <x-input max="{{ $product->stock }}" min="1"
                x-on:input="btnDisabled = true; $event.target.value > {{ $product->stock }} ? showValidationResponse({{ $val }}) : '' "
                x-on:blur="$event.target.value < 1 ? showValidationResponse({{ $val }}) : btnDisabled = false"
                x-model.number="items[{{ $val }}]" class="block w-16 h-10 pr-2" type="number" />
            @endif

            <form method="POST" action="{{ route('main.cart.destroy', ['cart' => $cart->id]) }}">
                @method('DELETE')
                @csrf
                <button type="submit" onclick="return confirm('Hapus item ini?')"><i
                        class="fa fa-trash text-red-500"></i></button>
            </form>
        </div>
    </div>
</div>