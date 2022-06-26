<tr>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200" style=" vertical-align:top">
        <p class="whitespace-nowrap">{{ $order->created_at }}</p>
    </td>

    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
        @foreach ($order->orderDetails as $item)
        <div class="flex justify-between">
            <div class="w-80 line-clamp-2">
                {{ $item->product->name}}
            </div>

            <div>
                {{"x" . $item->quantity}}
            </div>
        </div>

        <hr class="pb-2">
        @endforeach
        <p class="text-gray-500 whitespace-nowrap">{{ $order->quantity_total }} item</p>
    </td>

    @php
    $profile = $order->user->userProfile;
    @endphp

    <td class="px-6 py-4 border-b border-gray-200" style=" vertical-align:top">
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
</tr>