<tr>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200" style=" vertical-align:top">
        <p class="whitespace-nowrap">{{ $order->created_at }}</p>
    </td>

    @php
    $profile = $order->user->userProfile;
    @endphp

    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200" style=" vertical-align:top">
        <div class="text-sm font-bold">
            {{ $profile->fullname }}
        </div>

        <div class="text-sm">
            {{ $profile->phone }}
        </div>
    </td>

    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200" style=" vertical-align:top">
        <div class="whitespace-nowrap">@currency($order->product_total_amount)</div>
    </td>

    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200" style=" vertical-align:top">
        <div class="whitespace-nowrap">@currency($order->shipping_cost)</div>
    </td>

    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200" style=" vertical-align:top">
        <div class="whitespace-nowrap font-bold">@currency($order->grand_total_amount)</div>
    </td>
</tr>