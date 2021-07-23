@extends('layouts.main.app')

@section('title', 'Kontak')

@section('content')
<div class="mt-6 px-2 sm:px-8 xl:px-4 max-w-7xl mx-auto min-h-screen">
    <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-green-500 py-2">
        Kontak
    </div>

    <div class="bg-white py-8 px-2 sm:px-8 flex justify-center mt-4">
        


            <div class="col-md-10">
                <div class="card mb-5 shadow">
                    <div class="card-body p-4 text-justify">
                        <h5 class="card-title text-center"><strong>
                                Rudi Bonsai
                            </strong></h5>
                            <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-green-500 py-2"></div>

                        <div class="mt-4">
                            <label><strong>Nama Pemilik</strong></label>
                            <p class="form-control bg-light">Rudi Setiawan</p>

                        </div>
                        <div class=" ">
                            <label><strong>No Telepon / Whatsapp</strong></label>
                            <p class="form-control bg-light">0812-1234-1234</p>

                        </div>
                        <div class="">
                            <label><strong> Alamat Toko</strong></label>
                            <p class="form-control bg-light"> Desa Wonorejo, Dusun kembangarum, RT 3/ RW 3, Kecamatan
                                Talun, Kabupaten Blitar, Provinsi Jawa Timur , Indonesia </p>

                        </div>

                    </div>

                </div>
                <div class="card-mb-5 shadow">
                    <div class="card-body p-4 text-justify">
                    <div class="embed-responsive embed-responsive-21by9 bg-dark">
                        <iframe class=" embed-responsive-item d-block w-100 card-img-top"
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1975.0046339371477!2d112.290506!3d-8.100536!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x922690c6a3f1ca0b!2sBelanja%20keperluan%20bonsai!5e0!3m2!1sid!2sid!4v1609388429121!5m2!1sid!2sid"
                                width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                                tabindex="0">
                        </iframe>
                        </div>
                    </div>
                </div>
                <div class="card-mb-5 shadow">
                    <div class="card-body p-4 text-justify mt-4">
                    <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScGFpRvlJwaaFG9ncOZeHJ36obBYyOqgKrQuGv-jGcAYw9Z_A/viewform?embedded=true" width="100%" height="900px" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
                    </div>
                </div>
            </div>
       

    </div>
</div>



</div>
</div>
@endsection
