@extends('layouts.main.app')
{{-- @dd($user) --}}
@section('title', 'account')

@section('content')
<div class="mt-5 px-2 sm:px-8 xl:px-4 max-w-2xl mx-auto min-h-screen">
    <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-pink-500 py-2">
        Pengaturan Profil
    </div>

    <div class="bg-white overflow-auto whitespace-nowrap mt-4 p-7 rounded-md shadow ">
        <form enctype="multipart/form-data" name="profile_edit" class="mt-8 space-y-6"
            action="{{ route('main.account.update') }}" method="POST">
            @csrf
            @method('PUT')
            <label class=" block text-sm font-medium text-gray-700 text-center">
                Profile
            </label>
            @if ($user->userProfile->profile_picture == 'default')
            <i class="fas fa-user-circle my-auto"></i>
            @else
            {{-- <img class="h-80 w-80 rounded-full"
                src="{{ asset('storage/img/profile-picture/') . '/' . $user->userProfile->profile_picture }}" alt="">
            --}}
            <center>
                <div class="w-40 h-40">
                    <div class="aspect-w-1 aspect-h-1 bg-center bg-cover rounded-full"
                        style="background-image: url('{{ asset('storage/img/profile-picture/') . '/' . $user->userProfile->profile_picture }}')">
                    </div>
                </div>
            </center>
            @endif
            <center>
                {{-- <button type="button"
                    class="ml-1 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Change
                </button> --}}
                <label for="profileupload"
                    class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                    <span>Upload Profile</span>
                    <input id="profileupload" name="profileupload" type="file" class="sr-only">
                </label>
            </center>

            <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-grey-500 py-2">
            </div>

            <div class="form-group">
                <label for="name" class="sr-only">Nama Lengkap</label>

                <input id="fullname" name="fullname" type="text" autocomplete="fullname" required
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm "
                    placeholder="Nama Lengkap" value="{{ $user->userProfile->fullname }}">
            </div>

            {{-- <div class="form-group">
                <label for="gender" class="sr-only">Jenis Kelamin</label>

                <select name="gender" id="gender" autocomplete="gender" required
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Pilih Gender</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div> --}}

            <div class="form-group">
                <label for="name" class="sr-only">Nomor Telepon</label>

                <input id="phone" name="phone" type="number" minlength="9" maxlength="13" autocomplete="fullname"
                    required
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Nomor Telepon" value="{{ $user->userProfile->phone }}">
            </div>

            <div x-data="getAlamat()" x-init="setBaseUrl('{{ url('/') }}'), fetchProvinsi()" class="mt-4">
                <x-label :value="__('Alamat')" />

                <x-select x-model="selectedProv" x-on:change="changeProv()" x-bind:disabled="provDisable" required
                    name="province_id">
                    <option value="{{ $user->userProfile->province_id }}">{{ $user->userProfile->province->province_name
                        }}</option>

                    <template x-for="prov in dataProvinsi">
                        <option :value="prov.province_id" x-text="prov.province_name"></option>
                    </template>
                </x-select>

                <x-select x-model="selectedKab" x-on:change="changeKab()" x-bind:disabled="kabDisable" required
                    name="city_id" id="kabupaten">
                    <option value="{{ $user->userProfile->city_id }}">{{ $user->userProfile->city->city_name }}</option>

                    <template x-for="kab in dataKabupaten">
                        <option :value="kab.city_id" x-text="kab.city_name"></option>
                    </template>
                </x-select>

                <x-select x-bind:disabled="kecDisable" name="subdistrict_id" id="kecamatan" required>
                    <option value="{{ $user->userProfile->subdistrict_id }}">{{
                        $user->userProfile->subdistrict->subdistrict_name }}</option>

                    <template x-for="kec in dataKecamatan">
                        <option :value="kec.subdistrict_id" x-text="kec.subdistrict_name"></option>
                    </template>
                </x-select>
            </div>
            <div class="form-group">
                <textarea name="address" rows="3"
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                    placeholder="alamat lengkap">{{ $user->userProfile->address_detail }}</textarea>
            </div>

            <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-grey-500 py-2">
            </div>

            <div class="form-group">
                <label for="password" class="sr-only">Password Baru</label>
                <input id="password" name="password" type="password" autocomplete="fullpassword" minlength="7"
                    class="form-password mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="New Password">
            </div>
            <!-- <div class="form-group">
                    <label for="password_confirm" class="sr-only">Password Baru Confirmasi</label>
                    <input id="password_confirm" name="password_confirm" type="password" autocomplete="fullpassword"
                        minlength="7" 
                        class="password_confirm mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="New Password Confirm">
                </div> -->
            <div>
                <button type="submit" class="btn btn-primary hover-darken-primary text-center w-full block">
                    Ubah Profil
                </button>
            </div>
            <div>
                <a href="{{ route('main.account.index') }}" type="button"
                    class="btn btn-outline-primary text-center hover-primary w-full block">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
<script>
    function getAlamat() {
        return {
            dataProvinsi: null,
            dataKabupaten: null,
            dataKecamatan: null,
            provDisable: true,
            kabDisable: true,
            kecDisable: true,
            selectedProv: null,
            selectedKab: null,
            baseUrl: null,
            setBaseUrl(url) {
                this.baseUrl = url;
            },
            changeProv() {
                this.dataKabupaten = null;
                this.dataKecamatan = null;
                this.fetchKabupaten();
                this.kabDisable = true;
                this.kecDisable = true;
            },
            changeKab() {
                this.dataKecamatan = null;
                this.fetchKecamatan();
                this.kecDisable = true;
            },
            fetchProvinsi() {
                fetch(`${this.baseUrl}/api/address/provinces`)
                    .then(res => res.json())
                    .then(data => {
                        this.dataProvinsi = data;
                        this.provDisable = false;

                        // console.log(this.dataProvinsi);
                    });
            },
            fetchKabupaten() {
                fetch(`${this.baseUrl}/api/address/provinces/${this.selectedProv}/cities`)
                    .then(res => res.json())
                    .then(data => {
                        this.dataKabupaten = data;
                        this.kabDisable = false;

                        // console.log(this.dataKabupaten);
                    })
            },
            fetchKecamatan() {
                fetch(`${this.baseUrl}/api/address/cities/${this.selectedKab}/subdistricts`)
                    .then(res => res.json())
                    .then(data => {
                        this.dataKecamatan = data;
                        this.kecDisable = false;

                        // console.log(this.dataKecamatan);
                    })
            }
        }
    }

</script>
@endsection