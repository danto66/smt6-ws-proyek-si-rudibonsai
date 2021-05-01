@extends('layouts.main.app')

@section('content')
    <div class="mt-8 px-2 sm:px-8 xl:px-4 max-w-7xl mx-auto">
        <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-green-500 py-2">
            Produk
        </div>

        <div class="mt-6 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 sm:gap-4">
            <x-product.card />
            <x-product.card />
            <x-product.card />
            <x-product.card />
            <x-product.card />
            <x-product.card />
            <x-product.card />

        </div>

    </div>
@endsection
