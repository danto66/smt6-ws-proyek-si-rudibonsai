<nav x-data="navbar()" class="bg-white shadow fixed w-full top-0 z-20">
    <div class="max-w-7xl mx-auto px-2 sm:px-8 xl:px-4 lg:relative">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button x-on:click="open('menu')" type="button"
                    class="focus:outline-none inline-flex items-center justify-center p-3 border-2 rounded-md text-gray-400"
                    aria-controls="mobile-menu" aria-expanded="false">

                    <span class="sr-only">Open main menu</span>

                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                {{-- logo header kiri --}}
                <div class="flex-shrink-0 flex items-center lg:mr-8">
                    <img class="block lg:hidden h-8 w-auto" src="{{ asset('img/logo/bonsai.svg') }}" alt="">

                    <div class="hidden lg:flex space-x-2">
                        <img class="my-auto h-8 w-auto" src="{{ asset('img/logo/bonsai.svg') }}" alt="">

                        <span class="my-auto text-2xl font-semibold h-8 w-auto font-poppins">
                            RudiBonsai
                        </span>
                    </div>
                </div>

                {{-- menu utama tengah --}}
                <div class="hidden sm:absolute sm:flex sm:justify-center sm:w-full">
                    <div class="flex space-x-4">
                        <a href="/"
                            class="menu navbar-item menu-hover {{ request()->routeIs('main.home') ? 'menu-active' : '' }}">Home</a>

                        <a href="/products"
                            class="menu navbar-item menu-hover {{ request()->routeIs('main.products*') ? 'menu-active' : '' }}">Produk</a>

                        <div class="relative">
                            {{-- button dropdown menu info --}}
                            <button x-on:click="{dropdownInfo = true}"
                                class="focus:outline-none menu navbar-item menu-hover">Info
                                <i class="fas fa-caret-down"></i>
                            </button>

                            {{-- menu list dropdown info --}}
                            <div x-show="dropdownInfo" x-on:click.away="{dropdownInfo = !dropdownInfo}"
                                class="top-12 py-2 w-48 right-0 rounded absolute shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                                <a href=""
                                    class="menu menu-hover dropdown-item block text-sm font-medium rounded-t">Tentang
                                    Kami</a>

                                <a href="" class="menu menu-hover dropdown-item block text-sm font-medium ">Kontak</a>

                                <a href=""
                                    class="menu menu-hover dropdown-item block text-sm font-medium ">Pembayaran</a>

                                <a href=""
                                    class="menu menu-hover dropdown-item block text-sm font-medium rounded-b">Pengiriman</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @auth
                <div class="absolute inset-y-0 right-0 z-30 flex items-center">
                    <!-- Profile dropdown -->
                    <div class="relative flex justify-between">
                        <a class="hidden sm:flex justify-center text-sm rounded-xl px-3 py-1 bg-green-300 hover:bg-green-500"
                            href="/carts">
                            <i class="my-auto fas fa-shopping-cart mr-2"></i>
                            <span class="text-sm my-auto font-semibold"> {{ $cart > 0 ? $cart : 0 }} </span>
                        </a>

                        <button x-on:click="open('dropdown')" type="button" class="ml-2 text-3xl flex" id="user-menu"
                            aria-expanded="false" aria-haspopup="true">
                            <span x-show="!isOpen('dropdown')"
                                class="sm:hidden absolute font-semibold -top-2 right-7 bg-green-300 text-black p-1 px-2 rounded-lg text-xs">
                                {{ $cart }} </span>
                            <span class="sr-only">Open user menu</span>

                            @if ($profile->profile_picture == 'default')
                                <i class="fas fa-user-circle my-auto"></i>
                            @else

                                <img class="h-8 w-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="">
                            @endif
                        </button>
                    </div>
                </div>

                <div x-show="isOpen('dropdown')" x-on:click.away="close"
                    class="top-16 w-full sm:w-48 right-0 absolute rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                    <div href="#" class="border-b-2 border-gray-100 block px-4 py-2 text-sm font-semibold">
                        {{ $profile->fullname }} </div>

                    <a href="{{ route('main.cart.index') }}"
                        class="flex justify-between sm:hidden menu menu-hover dropdown-item" role="menuitem">
                        <span>
                            <i class="mr-2 fas fa-shopping-cart"></i>
                            Keranjang
                        </span>
                        <span class="bg-green-300 text-black px-2 rounded-md">
                            {{ $cart }}
                        </span>
                    </a>

                    <a href="#" class="block menu menu-hover dropdown-item" role="menuitem">
                        <i class="mr-2 fas fa-user"></i>
                        Akun
                    </a>

                    <a href="#" class="block menu menu-hover dropdown-item" role="menuitem">
                        <i class="mr-2 fas fa-receipt"></i>
                        Pesanan
                    </a>

                    <!-- Authentication -->
                    <div class="border-gray-100 border-t-2 block hover:bg-gray-100">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button class="w-full text-left menu menu-hover dropdown-item">
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
    <div x-show="isOpen('menu')" x-on:click.away="close" class="sm:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-4 space-y-1">
            <a href="#"
                class="rounded px-3 py-2 block menu menu-hover {{ request()->routeIs('main.home') ? 'menu-active' : '' }}">Home</a>

            <a href="/products"
                class="rounded px-3 py-2 block menu menu-hover {{ request()->routeIs('main.products*') ? 'menu-active' : '' }}">Produk</a>

            <div class="rounded">
                <button x-on:click="{dropdownInfo = !dropdownInfo}"
                    class="rounded block px-3 py-2 w-full text-left focus:outline-none menu menu-hover">Info
                    <i :class="dropdownInfo ? 'rotate-180 transform duration-300': 'rotate-0 transform duration-300'"
                        class="ml-2 fas fa-caret-down"></i></button>

                <div x-show="dropdownInfo" class="p-2 border-2 rounded">
                    <a href="" class="block menu menu-hover dropdown-item rounded">Tentang
                        Kami</a>

                    <a href="" class="block menu menu-hover dropdown-item rounded">Kontak</a>

                    <a href="" class="block menu menu-hover dropdown-item rounded">Pembayaran</a>

                    <a href="" class="block menu menu-hover dropdown-item rounded">Pengiriman</a>
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
    function navbar() {
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
