@extends('layouts.base')

@section('app')

    <body class="bg-gray-200">
        <div class="flex justify-center sm:mt-20">
            <div class="w-4/12 bg-white p-6 rounded-lg">
                <div class=" text-center pb-3 border-b-2 border-gray-200">
                    <p class="text-xl font-semibold">
                        Selamat datang admin.
                    </p>
                </div>

                <div class="mt-6">
                    @if (session('status'))
                        <div class="w-full flex justify-center bg-red-400 font-bold text-white p-4 rounded mb-4">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.login') }}" method="post">
                        @csrf
                        <div class="mt-4">
                            <label for="email" class="sr-only">Email</label>

                            <input value="{{ old('email') }}" type="email" name="email" id="email"
                                placeholder="Masukkan email anda"
                                class="@error('email') border-red-500 @enderror bg-gray-100 border-2 w-full p-4 rounded-lg">

                            @error('email')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="password" class="sr-only">Password</label>

                            <input type="password" name="password" id="password" placeholder="Masukkan password anda"
                                class="@error('password') border-red-500 @enderror bg-gray-100 border-2 w-full p-4 rounded-lg">

                            @error('password')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <div class="flex items-center">
                                <input type="checkbox" name="remember" id="remember" class="mr-2">

                                <label for="remember">Ingat saya.</label>
                            </div>
                        </div>

                        <div class="mb-3 mt-8">
                            <button type="submit"
                                class="font-bold text-white btn w-full rounded bg-blue-500 py-2">Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

@endsection
