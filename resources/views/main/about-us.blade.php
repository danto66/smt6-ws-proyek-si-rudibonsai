@extends('layouts.main.app')

@section('title', 'Tentang Kami')

@section('content')
<div class="mt-6 px-2 sm:px-8 xl:px-4 max-w-7xl mx-auto min-h-screen">
    <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-green-500 py-2">
        Tentang Kami
    </div>

    <div class="bg-white py-8 px-2 sm:px-8 flex justify-center mt-4 ">
        <div class="col-md-10">
            <center>
                <div class="card mb-5 shadow w-5/6">
                    <div class="card-body p-4 text-justify">

                        <center>
                            <img class="mt-4" src=" {{ asset('img/hero/bonsai.jpg') }}"
                                style="width: 90%; height: 60%; " alt="" srcset="">
                        </center>
                        <h5 class="card-title text-center font-mono text-3xl mt-4">
                            <strong> Rudi Bonsai </strong>
                        </h5>
                        <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-green-500 py-2">
                        </div>
                        <ol class="mt-4 list-outside list-decimal p-6 font-poppins">
                            <li>Rudi Bonsai melayani penjualan berbagai macam tanaman bonsai, tanaman hias, dan berbagai
                                macam perlengkapan berkebun. Rudi Bonsai berdiri pada tahun 2018, berlokasi di kabupaten
                                Blitar, Jawa Timur, Indonesia.</li>
                            <li> Kami menerima pengiriman hampir ke seluruh indonesia, karena tidak banyak agen
                                ekspedisi
                                yang menerima pengiriman tanaman, untuk saat ini kami hanya mengirimkan produk kami
                                melalui
                                agen ekspedisi JNE, TIKI, Dan Pos Indonesia yang pastinya terpercaya.</li>
                        </ol>
                    </div>
                </div>
            </center>

            <center>
                <div class="card mb-5 shadow w-5/6 ">
                    <div class="card-body p-4 text-justify">
                        <h5 class="card-title text-center font-mono text-3xl">
                            <strong> VISI & MISI </strong>
                        </h5>
                        <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-green-500 py-2">
                        </div>
                        <ul class="text-justify mt-4 p-8 list-outside list-disc font-poppins">
                            <li>Menciptakan kenyamanan dalam berbelanja melaui sistem web sehingga customer dapat
                                menghemat waktu dan lebih praktis dalam berbelanja</li>
                            <li>Menjadi pusat jual beli terlengkap produk berkebun dan pertanian melalui media internet
                            </li>
                            <li>Menghidupkan lapangan peluang baru bagi individu yang berkecimpung dalam bidang usaha
                                berkebun dan pertanian.</li>
                            <li>Meningkatkan kesadaran masyarakat pada umumnya mengenai pentingnya hidup Go Green</li>
                            <li>Mengakomodasi pergerakan serta geliat agribisnis di tanah agraris Indonesia tercinta.
                            </li>
                        </ul>
                    </div>
                </div>
            </center>


        </div>





    </div>
</div>
@endsection
