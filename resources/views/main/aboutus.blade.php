@extends('layouts.main.app')
@section('title', 'account')

@section('content')
<div class="mt-5 px-2 sm:px-8 xl:px-4 max-w-5xl mx-auto min-h-screen">
    <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-green-500 py-2">
       Tentang Kami
    </div>

    <div class="bg-white overflow-auto whitespace-nowrap mt-4 p-7 rounded-md shadow ">
        <div class="embed-responsive embed-responsive-21by9 bg-dark">
            <img style="object-fit: cover; object-position: 0 0; opacity: 0.5; filter: blur(2px);" src="{{ asset('img/hero/tentang_kami_img.jpg') }}" class=" embed-responsive-item d-block w-90 card-img-top" alt="...">
        </div>
        <div class="bg-white w-full py-2 px-2 sm:px-0 flex justify-center">
            <div class="max-w-5x1 grid gap-4 grid-cols-1 md:grid-cols-1">
                <div class="p-4 rounded shadow flex">
                    <div class="flex flex-auto flex-col ml-auto">
                        <div class="font-bold text-lg text-gray-800 leading-tight">
                            Produk Berkualitas
                        </div>

                        <div class="text-sm text-gray-500 mt-1 leading-tight">
                            Kami menyediakan tanaman berkualitas yang dirawat dengan baik.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection