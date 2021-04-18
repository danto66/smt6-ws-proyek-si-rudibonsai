<x-guest-layout>
    <x-auth-card>
        <x-slot name="cardHeader">
            <span>Lupa Password</span>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Lupa password? Jangan khawatir. Beritahu kami email akun anda dan kami akan mengirimkan link untuk reset password ke email anda.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Kirim Link Reset Password') }}
                </x-button>
            </div>
        </form>
        <x-slot name="cardFooter">

        </x-slot>
    </x-auth-card>
</x-guest-layout>
