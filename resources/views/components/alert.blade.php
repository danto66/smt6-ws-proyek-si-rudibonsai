@props(['type' => 'success'])

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
    default:
        $color = 'green';
        break;
}
@endphp

<div class="p-4 w-full mt-4 rounded text-{{ $color }}-700 bg-{{ $color }}-200">
    {{ $slot }}
</div>
