<x-guest-layout>
    <x-auth-card>
        <x-slot name="cardHeader">
            <span>Konfirmasi Password</span>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Tolong konfirmasi password sebelum melanjutkan.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                <x-button>
                    {{ __('Konfirmasi') }}
                </x-button>
            </div>
        </form>
        <x-slot name="cardFooter">

        </x-slot>
    </x-auth-card>
</x-guest-layout>
