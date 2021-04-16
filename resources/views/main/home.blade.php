@extends('layouts.main.app')

@section('content')
    <div class="relative">
        <div class="bg-black h-80 sm:h-auto relative flex items-center">
            <div class="w-full h-auto">
                <img class="object-cover sm:object-contain h-80 w-full sm:h-auto opacity-50"
                    src="{{ asset('img/hero/hero-section-bonsai-2.jpg') }}" alt="">
            </div>
            <div class="absolute w-full">
                <div class="px-8 xl:px-4 text-center lg:text-left max-w-7xl mx-auto">
                    <p class="lg:w-1/2 text-3xl md:text-6xl text-white font-bold ">
                        Lorem ipsum, dolor sit dolor sit
                    </p>
                    <p class="lg:w-1/2 text-lg md:text-xl text-gray-300 font-semibold mt-6 leading-5">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis, quaerat! Lorem
                    </p>

                    <p class="mt-8">
                        <span class="font-semibold mr-2 text-gray-100">Telusuri</span>
                        <a href="" class="btn btn-green hover-darken-green">
                            Produk
                        </a>

                    </p>
                </div>
            </div>
        </div>

        {{-- produk terbaru --}}
        <div class="mt-8 px-2 sm:px-8 xl:px-4 max-w-7xl mx-auto">
            <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-green-500 py-2">
                Produk terbaru
            </div>

            <div class="mt-6 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 sm:gap-4">
                <x-card.product-card />

            </div>

        </div>

    </div>
@endsection
