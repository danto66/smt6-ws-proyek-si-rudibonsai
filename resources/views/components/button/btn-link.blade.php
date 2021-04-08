@props(['href'])

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'px-4 py-2 rounded-md font-semibold shadow-md']) }}>
    {{ $slot }}
</a>
