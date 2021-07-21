@extends('layouts.admin.app')
{{-- @dd($admin) --}}
@section('title', '')

@section('content')
<div class="mt-5 px-2 sm:px-8 xl:px-4 max-w-2xl mx-auto min-h-screen">
    <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-blue-500 py-2">
        Setting Admin
    </div>

    <div class="bg-white overflow-auto whitespace-nowrap mt-4 p-7 rounded-md shadow ">
        <form enctype="multipart/form-data" name="profile_edit" class="mt-8 space-y-6" action="{{ route('main.account.update') }}" method="POST">
            @csrf
            @method('PUT')
            
                <div class="form-group">
                    <label for="name" class="sr-only">Nama Lengkap</label>

                    <input id="fullname" name="fullname" type="text" autocomplete="fullname" required
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm "
                        placeholder="Nama Lengkap" value="{{ $admin->email }}">
                </div>
                <!-- <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-gray-500 py-2"></div> -->
                <div class="form-group">
                    <label for="password" class="sr-only">Password Baru</label>
                    <input id="password" name="password" type="password" autocomplete="fullpassword" minlength="7"
                        
                        class="form-password mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="New Password">
                </div>
                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-500 hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Ubah Profil
                      </button>
                </div>
                <div>
                    <a href="{{ route('admin.dashboard') }}" type="button" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Kembali
                    </a>
                </div>
        </form>
    </div>

@endsection