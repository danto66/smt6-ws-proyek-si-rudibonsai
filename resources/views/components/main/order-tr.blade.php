<tr>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
        <p class="whitespace-nowrap">{{ $order->created_at }}</p>
    </td>

    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
        @foreach ($order->products as $item)
            <p class="w-80 font-bold line-clamp-2">
                {{ $item->name . ',' }}
            </p>
        @endforeach
        <p class="text-gray-500 whitespace-nowrap">{{ $order->quantity_total }} item</p>
    </td>

    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
        <x-pill :status="strtolower($order->status)" />
    </td>

    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
        <p class="whitespace-nowrap">@currency($order->grand_total_amount)</p>
    </td>

    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
        <a class="btn btn-green" href="{{ route('main.order.detail', ['order' => $order->id]) }}">Detail</a>
    </td>
</tr>
