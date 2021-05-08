@props(['name', 'id'])

<tr>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
        <div class="whitespace-nowrap text-sm leading-5 text-gray-900">
            {{ $name }}
        </div>
    </td>

    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
        <div class="flex justify-end space-x-2 text-white text-xs font-semibold">
            <button
                x-on:click="inputCategoryValue = '{{ $name }}'; inputCategoryId = '{{ $id }}'; modalCategoryShow = true; modalTitle='Edit Kategori'; actionPost=false;"
                class="py-1 px-3 rounded hover:bg-yellow-700 bg-yellow-500">Edit</button>

            <form method="POST" action="{{ route('admin.categories.destroy', ['category' => $id]) }}">
                @method('DELETE')
                @csrf
                <button onclick="return confirm('Hapus item ini?')" type="submit" class="py-1 px-3 rounded hover:bg-red-700 bg-red-500">Hapus</button>
            </form>
        </div>
    </td>
</tr>
