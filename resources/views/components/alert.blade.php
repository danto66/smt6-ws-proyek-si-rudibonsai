@props(['type' => '', 'status' => ''])

@php
switch ($type) {
    case 'danger':
        $color = 'red';
        break;
    case 'warning':
        $color = 'yellow';
        break;
    case 'info':
        $color = 'indigo';
        break;
    case 'primary':
        $color = 'blue';
        break;
    case 'success':
        $color = 'green';
        break;
}

switch ($status) {
    case 'tertunda':
        $color = 'yellow';
        $msg = 'Silahkan upload bukti transfer dan tunggu konfirmasi dari kami.';
        break;
    case 'diproses':
        $color = 'indigo';
        $msg = 'Pesanan sedang diproses.';
        break;
    case 'dikirim':
        $color = 'blue';
        $msg = 'Pesanan sedang dikirim.';
        break;
    case 'selesai':
        $color = 'green';
        $msg = 'Pesanan telah selesai.';
        break;
    case 'batal':
        $color = 'red';
        $msg = 'Pesanan dibatalkan.';
        break;
}
@endphp

<div class="p-4 w-full mt-4 rounded text-{{ $color }}-700 bg-{{ $color }}-200">
    {{ $slot }}
    @if (isset($msg))
        <span class="font-bold">(Status : {{ ucfirst($status) }}) </span> {{ $msg }}
    @endif
</div>
