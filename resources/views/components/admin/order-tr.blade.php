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

    @php
        $profile = $order->user->userProfile;
    @endphp

    <td class="px-6 py-4 border-b border-gray-200">
        <div>
            <p class="text-sm font-bold">
                {{ $profile->fullname }}
            </p>

            <p class="text-sm">
                {{ $profile->phone }}
            </p>

            <p class="text-sm">
                {{ auth()->user()->email }}
            </p>
        </div>

        <div class="mt-2">
            <p class="text-sm">
                <span>{{ $profile->province->province_name }}, </span>
                <span>{{ $profile->city->city_name }}, </span>
                <span>{{ $profile->subdistrict->subdistrict_name }}</span>
            </p>

            <p class="text-sm">
                {{ $profile->address_detail }}
            </p>
        </div>

    </td>

    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
        <a class="btn btn-green" href="{{ route('main.order.detail', ['order' => $order->id]) }}">Detail</a>
    </td>
</tr>
