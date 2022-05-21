@extends('layouts.main.app')

@section('title', 'Pembayaran')

@section('content')
<div class="mt-6 px-2 sm:px-8 xl:px-4 max-w-7xl mx-auto min-h-screen">
    <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-green-500 py-2">
        Pembayaran
    </div>

    <div class="bg-white py-8 px-2 sm:px-8 flex justify-center mt-4">
        <div class="card mb-5 shadow w-5/6 m-4">
            <div class="card-body m-4 p-4">
                <h5 class="card-title text-center font-mono text-3xl mt-4">
                    <strong> Metode Pembayaran </strong>
                </h5>
                <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-green-500 py-2">
                </div>
                <p class="mt-4 text-left"><strong> 3 Cara Pembayaran, yaitu :</strong></p>
                <ol class="text-justify p-6 font-poppins list-outside list-decimal ">
                    <li>Pembayaran Barang dengan mendatangi langsung ke tempat usaha Voaleta Kabupaten Jember,
                        Jawa Timur.</li>
                    <p class="mt-2">Pembayaran secara langsung ditempat usaha oleh Owner atau pemilik toko
                       Voaleta.</p>
                    <br>
                    <li>Pembayaran Barang dengan COD atau Langsung dalam wilayah Kabupaten Jember, Jawa Timur.</li>
                    <p class="mt-2">Pembayaran COD dilakukan secara langsung oleh Owner atau pemilik toko bonsai
                        dengan bertemu langsung dengan pembeli.</p>
                    <br>
                    <li>Pembayaran Barang di luar Kabupaten Jember, Jawa Timur.</li>
                    <p class="mt-2">Pembayaran Barang diluar kota bisa dilakukan dengan cara transfer bank dan E-Wallet.</p>
                    <br>
                </ol>
                <div class="card-body">

                    <p><strong>#NB: Jika Kurang Jelas, Dapat menghubungi kami melalui Kontak Kami</strong></p>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection
