@extends('layouts.base')

@section('body')

    <body>
        <div>
            <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
                <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
                    class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

                <x-admin.sidebar />

                <div class="flex-1 flex flex-col overflow-hidden">

                    <x-admin.topbar />

                    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">

                        <div class="container mx-auto px-2 sm:px-6 py-8">

                            <h3 class="text-gray-700 text-3xl font-medium">
                                @yield('title')
                            </h3>
                            @yield('content')

                        </div>
                    </main>
                </div>
            </div>
        </div>
    </body>
@endsection
