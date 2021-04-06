@extends('layouts.app')

@section('content')
    <div class="relative">
        <div class="hero bg-green-600 sm:bg-black h-80 sm:h-auto relative flex items-center">
            <div class="hidden sm:block w-full h-auto">
                <img class="opacity-50" src="{{ asset('img/hero/hero-section-bonsai-2.jpg') }}" alt="">
            </div>
            <div class="absolute w-full">
                <div class="px-8 xl:px-4 text-center lg:text-left max-w-7xl mx-auto">
                    <p class="lg:w-1/2 text-3xl md:text-6xl text-white font-bold ">
                        Lorem ipsum, dolor sit dolor sit
                    </p>
                    <p class="lg:w-1/2 text-lg md:text-xl text-gray-200 font-semibold mt-6 leading-5">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis, quaerat! Lorem
                    </p>

                    <p class="mt-8">
                        <span class="font-semibold mr-2 text-gray-200">Telusuri</span>
                        <x-utilities.btn-link href="#" class="bg-green-500 text-white hover:bg-green-700">
                            Produk
                        </x-utilities.btn-link>
                    </p>
                </div>
            </div>
        </div>

        {{-- <div class="px-2 sm:px-8 xl:px-4 py-8 mt-8 max-w-7xl mx-auto bg-white border-2">
            kjkjnkjn
        </div> --}}

        {{-- produk terbaru --}}
        <div class="mt-8 px-2 sm:px-8 xl:px-4 max-w-7xl mx-auto">
            <div class="text-gray-900 font-semibold text-3xl border-b-4 border-green-500 py-2">
                Produk terbaru
            </div>

            <div class="mt-6 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 sm:gap-4">
                <x-utilities.product-card />
                <x-utilities.product-card />
                <x-utilities.product-card />
                <x-utilities.product-card />
                <x-utilities.product-card />
                <x-utilities.product-card />
                <x-utilities.product-card />
                <x-utilities.product-card />
            </div>

        </div>

    </div>
@endsection
