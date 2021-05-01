@extends('layouts.base')

@section('app')

    <body class="font-sans antialiased bg-gray-100 pt-16">
        <x-main.navbar />

        @yield('content')

        <x-main.footer />

    </body>

    </html>
@endsection
