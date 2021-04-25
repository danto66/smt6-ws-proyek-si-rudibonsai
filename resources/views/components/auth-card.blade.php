<div
    {{ $attributes->merge(['class' => 'min-h-screen flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100']) }}>
    <div class="shadow-md w-full sm:max-w-md">
        <div class="bg-gray-800 text-white font-bold text-center text-xl px-6 py-4 rounded-t-lg">
            {{ $cardHeader }}
        </div>

        <div class="bg-white overflow-hidden px-6 py-4">
            {{ $slot }}
        </div>
        <div class="flex items-center justify-between px-6 py-4 rounded-b-lg bg-gray-800 text-white">
            <a class="underline text-sm text-gray-300 hover:text-gray-100" href="/">Home</a>
            <span class="text-sm">
                {{ $cardFooter }}
            </span>
        </div>
    </div>
</div>
