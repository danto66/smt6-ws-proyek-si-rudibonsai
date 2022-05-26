@props(['product'])

<div class="bg-white flex flex-col rounded shadow-md">
    <div class="relative">
        @php
        $img = $product->productImages;
        $primary = $img->where('is_primary', 1)->values();
        @endphp

        <div class="aspect-w-16 aspect-h-9 bg-center bg-cover"
            style="background-image: url('{{ asset('storage/img/products/') . '/' . ($primary->isNotEmpty() ? $primary[0]->name : $img->first()->name) }}')">
        </div>

        <div
            class="w-max absolute top-0 right-0 py-1 px-2 bg-gray-400 rounded-full font-semibold text-gray-50 text-xs line-clamp-2">
            {{ $product->productCategory->name }}
        </div>
    </div>


    <div class="w-full h-full p-2 sm:p-4 flex flex-col place-content-between">
        <div>
            <h1 class="text-gray-700 font-bold text-base sm:text-lg line-clamp-2">
                {{ $product->name }}
            </h1>

            <div class="mt-1 text-gray-600 text-xs sm:text-sm">
                <span class="font-semibold text-gray-400 hidden sm:block">Dimensi :</span>
                <span>{{ $product->length }}cm x {{ $product->width }}cm x {{ $product->height }}cm</span>
            </div>

            <div class="mt-2">
                <h1 class="text-gray-900 font-bold text-lg sm:text-lg">@currency($product->price)</h1>
            </div>
        </div>

        <div class="sm:flex sm:justify-end mt-3">
            @if ($product->stock > 0)
            <a href="{{ route('main.products.show', ['product' => $product->id]) }}"
                class="text-center block sm:inline-block sm:w-auto btn-sm btn-primary hover-darken-primary">
                Detail Produk
            </a>
            @else
            <div class="text-center block sm:inline-block sm:w-auto btn-sm btn-primary disabled">
                Stok Habis
            </div>
            @endif
        </div>
    </div>
</div>