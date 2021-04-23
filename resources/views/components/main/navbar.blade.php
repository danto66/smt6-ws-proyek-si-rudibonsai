<nav x-data="toggle()" class="bg-white shadow fixed w-full top-0 z-20">
    <div class="max-w-7xl mx-auto px-2 sm:px-8 xl:px-4 lg:relative">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">

                <!-- Mobile menu button-->
                <button x-on:click="open('menu')" type="button"
                    class="inline-flex items-center justify-center p-3 border-2 rounded-md text-gray-400"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>

                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center lg:mr-8">
                    <img class="block lg:hidden h-8 w-auto" src="{{ asset('img/logo/bonsai.svg') }}" alt="">
                    <div class="hidden lg:flex space-x-2">
                        <img class="my-auto h-6 w-6" src="{{ asset('img/logo/bonsai.svg') }}" alt="">
                        <span class="my-auto text-2xl font-bold  h-8 w-auto">
                            Rudibonsai
                        </span>
                    </div>
                </div>

                <div class="hidden sm:absolute sm:flex sm:justify-center sm:w-full">
                    <div class="flex space-x-4">
                        <a href="/" class="px-3 py-2 border-b-2 border-green-500 text-sm font-medium"
                            aria-current="page">Home</a>

                        <a href="/products"
                            class="text-gray-500 hover:text-black px-3 py-2 text-sm font-medium">Produk</a>

                        <div class="relative">
                            <button x-on:click="{dropdownInfo = !dropdownInfo}"
                                class="text-gray-500 hover:text-black px-3 py-2 text-sm font-medium">Info
                                <i class="fas fa-caret-down"></i>
                            </button>
                            <div x-show="dropdownInfo" x-on:click.away="{dropdownInfo = !dropdownInfo}"
                                class="top-12 py-2 w-48 right-0 rounded absolute shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                                <a href=""
                                    class="text-gray-500 hover:bg-gray-200 hover:text-black block py-2 px-4 text-sm font-medium rounded-t">Tentang
                                    Kami</a>
                                <a href=""
                                    class="text-gray-500 hover:bg-gray-200 hover:text-black block py-2 px-4 text-sm font-medium ">Kontak</a>
                                <a href=""
                                    class="text-gray-500 hover:bg-gray-200 hover:text-black block py-2 px-4 text-sm font-medium ">Pembayaran</a>
                                <a href=""
                                    class="text-gray-500 hover:bg-gray-200 hover:text-black block py-2 px-4 text-sm font-medium rounded-b">Pengiriman</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @auth
                <div class="absolute inset-y-0 right-0 z-30 flex items-center">
                    <!-- Profile dropdown -->
                    <div class="relative flex justify-between">
                        <a class="hidden sm:flex justify-center text-sm rounded-xl px-3 py-1 bg-green-300" href="">
                            <i class="my-auto fas fa-shopping-cart mr-2"></i>
                            <span class="text-sm my-auto font-semibold">36</span>
                        </a>

                        <button x-on:click="open('dropdown')" type="button" class="ml-2 text-3xl flex" id="user-menu"
                            aria-expanded="false" aria-haspopup="true">
                            <span
                                class="sm:hidden absolute font-semibold -top-2 right-7 bg-green-300 p-1 rounded-lg text-xs">36</span>
                            <span class="sr-only">Open user menu</span>
                            {{-- @if (auth()->user()->userProfile->profile_picture == 'default')
                                <i class="fas fa-user-circle my-auto"></i>
                            @else --}}
                            <img class="h-8 w-8 rounded-full"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="">
                            {{-- @endif --}}
                        </button>
                    </div>
                </div>
                <div x-show="isOpen('dropdown')" x-on:click.away="close"
                    class="top-16 w-full sm:w-48 right-0 absolute rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                    <div href="#" class="border-b-2 border-gray-100 block px-4 py-2 text-sm font-semibold" role="menuitem">
                        {{-- {{ auth()->user()->userProfile->fullname }} </div> --}}
                        <a href="#" class="font-semibold sm:hidden block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                            role="menuitem">
                            <i class="mr-2 fas fa-shopping-cart"></i>
                            <span>
                                Keranjang (32)
                            </span>
                        </a>
                        <a href="#" class="font-semibold block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                            role="menuitem">
                            <i class="mr-2 fas fa-user"></i>
                            Profil
                        </a>
                        <a href="#" class="font-semibold block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                            role="menuitem">
                            <i class="mr-2 fas fa-receipt"></i>
                            Pesanan
                        </a>

                        <!-- Authentication -->
                        <div class="border-gray-100 border-t-2 block hover:bg-gray-100">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button class="w-full px-4 py-2 text-left font-semibold text-sm text-gray-700">
                                    <i class="mr-2 fas fa-sign-out-alt"></i>
                                    Keluar
                                </button>
                            </form>
                        </div>

                    </div>
                @endauth
                @guest
                    <div class="z-30 hidden sm:inline">
                        <a href="/login" class="btn hover:underline text-green-500">Masuk</a>
                        <a href="/register" class="btn btn-outline-green hover-green">
                            Daftar
                        </a>
                    </div>
                @endguest

            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div x-show="isOpen('menu')" x-on:click.away="close" class=" sm:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-4 space-y-1">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="#"
                    class="rounded bg-gray-200 block px-3 py-2 text-base font-medium border-l-2 border-green-500"
                    aria-current="page">Home</a>

                <a href="/products"
                    class="rounded text-gray-500 hover:bg-gray-200 hover:text-black block px-3 py-2 text-base font-medium">Produk</a>

                <div class="rounded border-2">
                    <button x-on:click="{dropdownInfo = !dropdownInfo}"
                        class="text-gray-500 hover:bg-gray-200 hover:text-black block px-3 py-2 text-base font-medium w-full text-left">Info
                        <i class="fas fa-caret-down"></i></button>

                    <div x-show="dropdownInfo" class="pb-2 px-3">
                        <a href=""
                            class="text-gray-500 hover:bg-gray-200 hover:text-black block p-2 text-base font-medium">Tentang
                            Kami</a>
                        <a href=""
                            class="text-gray-500 hover:bg-gray-200 hover:text-black block p-2 text-base font-medium">Kontak</a>
                        <a href=""
                            class="text-gray-500 hover:bg-gray-200 hover:text-black block p-2 text-base font-medium">Pembayaran</a>
                        <a href=""
                            class="text-gray-500 hover:bg-gray-200 hover:text-black block p-2 text-base font-medium">Pengiriman</a>
                    </div>
                </div>

                @guest
                    <div class="border-t-2 pt-4 flex flex-col sm:hidden">
                        <a href="/login"
                            class="py-2 text-center font-medium text-green-500 ring-1 ring-green-500 rounded">Masuk</a>
                        <a href="/register"
                            class="mt-2 py-2 text-center font-medium rounded bg-green-500 text-white hover:bg-white hover:text-green-500 hover:ring-1 hover:ring-green-500">
                            Daftar
                        </a>
                    </div>
                @endguest
            </div>
        </div>
</nav>

<script>
    function toggle() {
        return {
            show: false,
            itemTarget: null,
            btnTrigger: null,
            dropdownInfo: false,
            open(btn) {
                this.btnTrigger = btn
                this.show = true
            },
            close() {
                this.show = false
            },
            isOpen(item) {
                this.itemTarget = item
                return (this.show === true && this.btnTrigger === this.itemTarget)
            },
        }
    }

</script>
