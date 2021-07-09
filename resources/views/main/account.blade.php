@extends('layouts.main.app')

@section('title', 'account')

@section('content')
<div class="mt-5 px-2 sm:px-8 xl:px-4 max-w-2xl mx-auto min-h-screen">
    <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-green-500 py-2">
        Pengaturan Profil
    </div>

    <div class="bg-white overflow-auto whitespace-nowrap mt-4 p-7 rounded-md shadow ">
            <form name="profile_edit" class="mt-8 space-y-6" action="#" method="POST"">
            <label class=" block text-sm font-medium text-gray-700 text-center">
                Profile
            </label>
                <div class="mt-1 flex items-center justify-center">
                    <span class="inline-block h-32 w-32 rounded-full overflow-hidden bg-gray-100">
                        <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </span>
                </div>
                <center>
                    {{-- <button type="button"
                        class="ml-1 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Change
                    </button> --}}
                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                        <span>Upload Profile</span>
                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                      </label>
                </center>
                <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-grey-500 py-2">
                </div>
                <div class="form-group">
                    <label for="name" class="sr-only">Nama Lengkap</label>
                    <input id="fullname" name="fullname" type="text" autocomplete="fullname" required
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm "
                        placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for="gender" class="sr-only">Jenis Kelamin</label>
                    <select name="gender" id="gender" autocomplete="gender" required
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>Pilih Gender</option>
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name" class="sr-only">Nomor Telepon</label>
                    <input id="phone" name="phone" type="number" minlength="9" maxlength="13" autocomplete="fullname" required
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="Nomor Telepon">
                </div>
                <div class="form-group">
                    <textarea name="Alamat Lengkap" rows="3"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                        placeholder="alamat lengkap"></textarea>
                </div>
                <div class="form-group">
                    <label for="province" class="sr-only">Provinsi</label>
                    <select name="province" id="gender" autocomplete="gender" required
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>Pilih Provinsi</option>
                        <option>Sumatera</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="City" class="sr-only">Kabupaten</label>
                    <select name="city" id="gender" autocomplete="city" required
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>Pilih Kabupaten</option>
                        <option>Padang</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Subdistrict" class="sr-only">Kecamatan</label>
                    <select name="Subdistrict" id="Subdistrict" autocomplete="gender" required
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>Pilih Kecamatan</option>
                        <option>Kedawang</option>
                    </select>
                </div>
                <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-grey-500 py-2">
                </div>
                <div class="form-group">
                    <label for="password" class="sr-only">Password Baru</label>
                    <input id="password" name="password" type="password" autocomplete="fullpassword" minlength="7"
                        required
                        class="form-password mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="New Password">
                </div>
                <div class="form-group">
                    <label for="password_confirm" class="sr-only">Password Baru Confirmasi</label>
                    <input id="password_confirm" name="password_confirm" type="password" autocomplete="fullpassword"
                        minlength="7" required
                        class="password_confirm mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="New Password Confirm">
                </div>
                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-500 hover:border-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Ubah Profil
                      </button>
                </div>
                <div>
                    <a href="/" type="button" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Kembali
                    </a>
                </div>
            </form>
    </div>
</div>
@endsection