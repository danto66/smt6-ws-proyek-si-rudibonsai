<x-guest-layout>
    <x-auth-card>
        <x-slot name="cardHeader">
            <span>Verifikasi Email</span>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Terimakasih telah mendaftar! Sebelum memulai, tolong verifikasi email anda terlebih dahulu dengan menekan link verifikasi yang telah kami kirim melalui email anda.') }}
        </div>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Periksa bagian SPAM pada akun email anda jika email dari kami tidak ditemukan. Jika anda tidak menerima email dari kami, dengan senang hati kami akan mengirim ulang email verifikasi.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('Link verifikasi baru telah dikirimkan ke alamat email anda.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Kirim Ulang Email Verifikasi') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Log out') }}
                </button>
            </form>
        </div>
        <x-slot name="cardFooter">

        </x-slot>
    </x-auth-card>
</x-guest-layout>
