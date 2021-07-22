@extends('layouts.main.app')

@section('title', 'Pengiriman')

@section('content')
    <div class="mt-6 px-2 sm:px-8 xl:px-4 max-w-7xl mx-auto min-h-screen">
        <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-green-500 py-2">
            Pengiriman
        </div>

        <div class="bg-white py-8 px-2 sm:px-8 flex justify-center mt-4">
            
            <div class="card-body">
                <div class="row justify-content-center">

                    <div class="col-md-10">
                        <div class="card mb-5 shadow">
                            <div class="card-body">
                                <h5 class="card-title text-center">
                                    Metode Pengiriman
                                </h5>
                                <hr>
                                <p>Terapat 2 Proses Pengiriman, yaitu :</p>
                                <ol>
                                    <li>Pengiriman Barang dengan COD atau Langsung dalam wilayah Kabupaten Blitar, Jawa Timur</li>
                                    <p class="mt-2">Pengiriman COD dilakukan secara langsung oleh petugas toko atau pemilik toko bonsai dengan bertemu langsung dengan pembeli.</p>
                                    <li>Pengiriman Barang di luar Kabupaten Blitar, Jawa Timur</li>
                                    <p class="mt-2">Pengiriman Barang diluar kota akan dilakukan apabila pembeli telah melakukan pembayaran terhadap barang pesanan, pengiriman barang akan dikirim melalui jasa pengiriman JNE, TIKI , dan Pos Indonesia yang dapat mencangkup seluruh wilayah di Indonesia.</p>
                                    <br>
                                </ol>
                                <p><strong>#Note: Pastikan Alamat Rumah dan Nomor Telepon Anda Sudah Tepat dan Benar!!</strong></p>

                            </div>
                        </div>
                    </div>


                </div>


            </div>

        </div>
    </div>
@endsection