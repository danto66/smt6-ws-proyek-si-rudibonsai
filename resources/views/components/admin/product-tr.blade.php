@props(['product' => $product])

<tr>
    <td class="p-2 whitespace-no-wrap border-b border-gray-200">
        <div class="flex justify-start items-center flex-col xl:flex-row">
            <div class="bg-gray-900 w-8/12 flex-shrink-0 flex-nowrap relative">
                @if ($img = $product->productImages()->where('is_primary', 1)->get()->first())
                    <div class="aspect-w-16 aspect-h-9 bg-center bg-contain bg-no-repeat"
                        style="background-image: url('{{ asset('storage/img/products/') . '/' . $img->name }}')">
                    </div>
                @else
                    <div class="aspect-w-16 aspect-h-9 bg-center bg-contain bg-no-repeat"
                        style="background-image: url('{{ asset('storage/img/products/') . '/' . $product->productImages->first()->name }}')">
                    </div>
                @endif

                <a href="{{ route('admin.products.images.edit', ['product' => $product->id]) }}"
                    class="absolute top-0 right-0 p-1 bg-yellow-500 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </a>
            </div>

            <div class="xl:ml-4 mt-4">
                <div class="text-sm leading-5 font-medium text-gray-900">
                    {{ $product->name }}
                </div>

                <div class="hidden sm:line-clamp-2 text-sm leading-5 text-gray-500">
                    {{ $product->description }}
                </div>
            </div>
        </div>
    </td>

    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
        <div class="whitespace-nowrap text-sm leading-5 text-gray-900">@currency($product->price)</div>
    </td>

    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
            {{ $product->product_category_id !== null ? $product->productCategory->name : '-' }}
        </span>
    </td>

    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-md bg-gray-100 text-gray-800">
            {{ $product->stock }}
        </span>
    </td>

    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
        <div>
            <div class="font-medium text-gray-900">Berat:</div>
            <div>
                {{ $product->weight }} gram
            </div>
        </div>
        <div class="mt-2">
            <div class="font-medium text-gray-900">Dimensi:</div>
            <div class="whitespace-nowrap">
                {{ $product->length }}cm x {{ $product->width }}cm x {{ $product->height }}cm
            </div>
        </div>
    </td>

    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
        <div class="flex items-center space-x-2 text-white text-xs font-semibold">
            <a href="{{ route('admin.products.edit', ['product' => $product->id]) }}"
                class="py-1 px-3 rounded hover:bg-yellow-700 bg-yellow-500">Edit</a>

            <form method="POST" action="{{ route('admin.products.destroy', ['product' => $product->id]) }}">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Hapus item ini?')" type="submit"
                    class="py-1 px-3 rounded hover:bg-red-700 bg-red-500">Hapus</button>
            </form>
        </div>
    </td>
</tr>
