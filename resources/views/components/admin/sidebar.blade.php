<div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
    class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
    <div class="flex items-center justify-center mt-8">
        <span class="text-white text-2xl mx-2 font-semibold">Voaleta</span>
    </div>

    <nav class="mt-10">
        <a class="flex items-center mt-4 py-2 px-6 sidebar-item sidebar-item-hover {{ request()->routeIs('admin.dashboard') ? 'sidebar-item-active' : '' }} "
            href="{{ route('admin.dashboard') }}">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
            </svg>

            <span class="mx-3">Dashboard</span>
        </a>

        <div x-data="{pesananOpen : false}">
            <button x-on:click="pesananOpen=true"
                class="flex justify-between w-full mt-4 py-2 px-6 sidebar-item sidebar-item-hover {{ request()->routeIs('admin.order.*') ? 'sidebar-item-active' : '' }}">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>

                    <span class="mx-3">Pesanan</span>
                </div>

                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div x-show="pesananOpen" x-on:click.away="pesananOpen = !pesananOpen" class="px-4 py-2">
                <div class="flex flex-col space-y-2 py-4 bg-white rounded">
                    <a class="hover:bg-gray-200 py-2 px-4" href="{{ route('admin.order.index') }}">Semua</a>

                    <a class="hover:bg-gray-200 py-2 px-4"
                        href="{{ route('admin.order.index', ['status' => 'tertunda']) }}">Tertunda</a>

                    <a class="hover:bg-gray-200 py-2 px-4"
                        href="{{ route('admin.order.index', ['status' => 'diproses']) }}">Diproses</a>

                    <a class="hover:bg-gray-200 py-2 px-4"
                        href="{{ route('admin.order.index', ['status' => 'dikirim']) }}">Dikirim</a>

                    <a class="hover:bg-gray-200 py-2 px-4"
                        href="{{ route('admin.order.index', ['status' => 'selesai']) }}">Selesai</a>

                    <a class="hover:bg-gray-200 py-2 px-4"
                        href="{{ route('admin.order.index', ['status' => 'batal']) }}">Batal</a>
                </div>
            </div>
        </div>

        <div x-data="{produkOpen : false}">
            <button x-on:click="produkOpen=true"
                class="flex justify-between w-full mt-4 py-2 px-6 sidebar-item sidebar-item-hover {{ request()->routeIs('admin.products.*') || request()->routeIs('admin.categories*') ? 'sidebar-item-active' : '' }}">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                    </svg>

                    <span class="mx-3">Produk</span>
                </div>

                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div x-show="produkOpen" x-on:click.away="produkOpen = !produkOpen" class="px-4 py-2">
                <div class="flex flex-col space-y-2 py-4 bg-white rounded">

                    <a class="hover:bg-gray-200 py-2 px-4" href="{{ route('admin.products.index') }}">Daftar
                        Produk</a>

                    <a class="hover:bg-gray-200 py-2 px-4" href="{{ route('admin.categories.index') }}">Kategori

                        Produk</a>
                </div>
            </div>
        </div>

        <a class="flex items-center mt-4 py-2 px-6 sidebar-item sidebar-item-hover"
            href="{{ route('admin.pelanggan') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>

            <span class="mx-3">Pelanggan</span>
        </a>

        <!-- @if (auth()->user()->role_id == 1) <a class="flex items-center mt-4 py-2 px-6 sidebar-item sidebar-item-hover {{ request()->routeIs('admin.admin_management.*') ? 'sidebar-item-active' : '' }}"
                href="{{ route('admin.admin_management.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>

                <span class="mx-3">Manajemen Admin</span>
            </a> @endif -->
    </nav>
</div>