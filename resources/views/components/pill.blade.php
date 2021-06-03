@php
switch ($status) {
    case 'tertunda':
        $color = 'yellow';
        break;
    case 'diproses':
        $color = 'indigo';
        break;
    case 'dikirim':
        $color = 'purple';
        break;
    case 'selesai':
        $color = 'green';
        break;
    case 'batal':
        $color = 'red';
        break;
}
@endphp

<div
    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $color }}-100 text-{{ $color }}-800">
    {{ ucfirst($status) }}
    {{ $slot }}
</div>
