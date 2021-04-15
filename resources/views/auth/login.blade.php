<x-guest-layout>
    <x-auth-card>
        <x-slot name="cardHeader">
            <span>Selamat Datang!</span>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('password.request') }}">
                        {{ __('Lupa password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    Masuk
                </x-button>
            </div>

            {{-- <div class="flex items-center justify-between pt-4 mt-4 border-gray-100 border-t-2">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/">Kembali</a>
                <span class="text-sm">
                    Belum punya akun?
                    <a class="underline  text-gray-600 hover:text-gray-900" href="{{ route('register') }}">Daftar</a>
                </span>
            </div> --}}
        </form>

        <x-slot name="cardFooter">
            Belum punya akun?
            <a class="underline  text-gray-300 hover:text-gray-100" href="{{ route('register') }}">Daftar</a>
        </x-slot>
    </x-auth-card>
</x-guest-layout>
