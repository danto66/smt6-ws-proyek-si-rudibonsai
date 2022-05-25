@extends('layouts.main.app')

@section('title', 'Home')

@section('content')
    <div class="relative">
        <div class="bg-black h-80 sm:h-auto relative flex items-center">
            <div class="w-full h-auto">
                <img class="object-cover sm:object-contain h-80 w-full sm:h-auto opacity-50"
                    src="{{ asset('img/hero/hijab.jpg') }}" alt="">
            </div>

            <div class="absolute w-full">
                <div class="px-8 xl:px-4 text-center lg:text-left max-w-7xl mx-auto">
                    <p class="lg:w-1/2 text-3xl md:text-6xl text-white font-bold ">
                        Menjual Hijab Berkualitas.
                    </p>

                    <p class="lg:w-1/2 text-lg md:text-xl text-gray-300 font-semibold mt-4 leading-5">
                        Voaleta menyediakan beragam jenis hijab yang sedang trend.
                    </p>

                    <p class="mt-8">
                        <a href="{{ route('main.products.index') }}" class="btn btn-green hover-darken-green">
                            Telusuri Produk
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-white w-full py-8 px-2 sm:px-8 flex justify-center">
            <div class="max-w-7xl grid gap-4 grid-cols-1 md:grid-cols-3">
                <div class="p-4 rounded shadow flex">
                    <div class="flex flex-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-yellow-500" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.744L14.146 7.2 17.5 9.134a1 1 0 010 1.732l-3.354 1.935-1.18 4.455a1 1 0 01-1.933 0L9.854 12.8 6.5 10.866a1 1 0 010-1.732l3.354-1.935 1.18-4.455A1 1 0 0112 2z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>

                    <div class="flex flex-auto flex-col ml-4">
                        <div class="font-bold text-lg text-gray-800 leading-tight">
                            Produk Berkualitas
                        </div>

                        <div class="text-sm text-gray-500 mt-1 leading-tight">
                            Kami menyediakan hijab berkualitas yang diproduksi dengan baik.
                        </div>
                    </div>
                </div>

                <div class="p-4 rounded shadow flex">
                    <div class="flex flex-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-blue-500" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                            <path
                                d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z" />
                        </svg>
                    </div>

                    <div class="flex flex-auto flex-col ml-4">
                        <div class="font-bold text-lg text-gray-800 leading-tight">
                            Jangkauan Luas
                        </div>

                        <div class="text-sm text-gray-500 mt-1 leading-tight">
                            Produk kami siap diantar ke seluruh Indonesia melalui agen pengiriman yang tersedia.
                        </div>
                    </div>
                </div>

                <div class="p-4 rounded shadow flex">
                    <div class="flex flex-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-red-500" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>

                    <div class="flex flex-auto flex-col ml-4">
                        <div class="font-bold text-lg text-gray-800 leading-tight">
                            Transaksi Terpercaya
                        </div>

                        <div class="text-sm text-gray-500 mt-1 leading-tight">
                            Transaksi dilakukan melalui transfer bank dengan sistem konfirmasi bukti transfer.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- produk terbaru --}}
        <div class="mt-8 px-2 sm:px-8 xl:px-4 max-w-7xl mx-auto">
            <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-red-500 py-2">
                Produk terbaru
            </div>

            <div class="mt-6 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 sm:gap-4">
                {{-- <x-main.product-card /> --}}
                @foreach ($latestProducts as $product)
                    <x-main.product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </div>
@endsection
