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
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="#" class="px-3 py-2 border-b-2 border-green-500 text-sm font-medium"
                            aria-current="page">Home</a>

                        <a href="#" class="text-gray-500 hover:text-black px-3 py-2  text-sm font-medium">Produk</a>

                        <a href="#" class="text-gray-500 hover:text-black px-3 py-2 text-sm font-medium">Info</a>
                    </div>
                </div>

            </div>

            @auth
                <div class="absolute inset-y-0 right-0 z-30 flex items-center">
                    <!-- Profile dropdown -->
                    <div>
                        <button x-on:click="open('dropdown')" type="button"
                            class="bg-green-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-800 focus:ring-white"
                            id="user-menu" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="">
                        </button>
                    </div>
                </div>
                <div x-show="isOpen('dropdown')" x-on:click.away="close"
                    class="top-14 w-full sm:w-1/4 right-0 absolute rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Your
                        Profile</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Settings</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign
                        out</a>
                </div>
            @endauth
            @guest
                <div class="z-30 hidden sm:inline">
                    <a href="" class="mr-2 font-semibold hover:text-green-500 text-gray-800">Masuk</a>
                    <x-button.btn-link href=""
                        class="bg-green-500 text-white hover:bg-white hover:text-green-500 hover:ring-1 hover:ring-green-500">
                        Daftar
                    </x-button.btn-link>
                </div>
            @endguest

        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen('menu')" x-on:click.away="close" class=" sm:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-4 space-y-1">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="#" class="bg-gray-200 block px-3 py-2 rounded-md text-base font-medium"
                aria-current="page">Home</a>

            <a href="#"
                class="text-gray-500 hover:bg-gray-200 hover:text-black block px-3 py-2 rounded-md text-base font-medium">Produk</a>

            <button x-on:click="{dropdownInfo = !dropdownInfo}"
                class="text-gray-500 hover:bg-gray-200 hover:text-black block px-3 py-2 rounded-md text-base font-medium w-full text-left">Info</button>
            <div x-show="dropdownInfo" class=" p-2 rounded border-2">
                <a href=""
                    class="text-gray-500 hover:bg-gray-200 hover:text-black block p-2 rounded-md text-base font-medium">Tentang
                    Kami</a>
                <a href=""
                    class="text-gray-500 hover:bg-gray-200 hover:text-black block p-2 rounded-md text-base font-medium">Kontak</a>
                <a href=""
                    class="text-gray-500 hover:bg-gray-200 hover:text-black block p-2 rounded-md text-base font-medium">Pembayaran</a>
                <a href=""
                    class="text-gray-500 hover:bg-gray-200 hover:text-black block p-2 rounded-md text-base font-medium">Pengiriman</a>
            </div>
            @guest
                <div class="border-t-2 pt-4 flex flex-col sm:hidden">
                    <a href="" class="py-2 text-center font-medium text-green-500 ring-1 ring-green-500 rounded">Masuk</a>
                    <a href=""
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
