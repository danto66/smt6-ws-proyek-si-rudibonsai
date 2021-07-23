@extends('layouts.main.app')

@section('title', 'Pengiriman')

@section('content')
    <div class="mt-6 px-2 sm:px-8 xl:px-4 max-w-7xl mx-auto min-h-screen">
        <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-green-500 py-2">
            Pengiriman
        </div>

        <div class="bg-white py-6 px-2 sm:px-8 flex justify-center mt-4">
            <div class="card mb-5 shadow w-5/6 m-4">
                <div class="card-body p-4 text-justify">
                    <p class="text-left font-poppins mt-5"><strong> 2 Proses Pengiriman, yaitu :</strong></p>
                        <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-green-500 py-2">

                        </div>
                     <div class="text-justify m-8 mt-2 card-body">
                        <ol class="list-decimal list-outside mt-4 font-mono">
                            <li class="font-bold">Pengiriman Barang dengan COD atau Langsung dalam wilayah Kabupaten Blitar, Jawa Timur</li>
                                <p class="mt-2 text-justify">Pengiriman COD dilakukan secara langsung oleh petugas toko atau pemilik toko bonsai dengan bertemu langsung dengan pembeli.</p>
                            <li class="font-bold">Pengiriman Barang di luar Kabupaten Blitar, Jawa Timur</li>
                                <p class="mt-2 text-justify">Pengiriman Barang diluar kota akan dilakukan apabila pembeli telah melakukan pembayaran terhadap barang pesanan, pengiriman barang akan dikirim melalui jasa pengiriman JNE, TIKI , dan Pos Indonesia yang dapat mencangkup seluruh wilayah di Indonesia.</p>
                            <br>
                        </ol>
                        <p><strong>#Note: Pastikan Alamat Rumah dan Nomor Telepon Anda Sudah Tepat dan Benar!!</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection