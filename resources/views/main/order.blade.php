@extends('layouts.main.app')

@section('title', 'Pesanan')

@section('content')
<div class="mt-6 px-2 sm:px-8 xl:px-4 max-w-7xl mx-auto min-h-screen">
    <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-pink-500 py-2">
        Pesanan
    </div>

    <div class="bg-white overflow-auto whitespace-nowrap mt-4 p-2 rounded-md shadow">
        <a class="{{ request()->is('orders') ? 'menu-active' : '' }} inline-block menu menu-hover navbar-item"
            href="{{ route('main.order.index') }}">
            Semua
        </a>

        <a class="{{ request()->is('orders/tertunda') ? 'menu-active' : '' }} inline-block menu menu-hover navbar-item"
            href="{{ route('main.order.index', ['status' => 'tertunda']) }}">
            Tertunda
        </a>

        <a class="{{ request()->is('orders/diproses') ? 'menu-active' : '' }} inline-block menu menu-hover navbar-item"
            href="{{ route('main.order.index', ['status' => 'diproses']) }}">
            Diproses
        </a>

        <a class="{{ request()->is('orders/dikirim') ? 'menu-active' : '' }} inline-block menu menu-hover navbar-item"
            href="{{ route('main.order.index', ['status' => 'dikirim']) }}">
            Dikirim
        </a>

        <a class="{{ request()->is('orders/selesai') ? 'menu-active' : '' }} inline-block menu menu-hover navbar-item"
            href="{{ route('main.order.index', ['status' => 'selesai']) }}">
            Selesai
        </a>

        <a class="{{ request()->is('orders/batal') ? 'menu-active' : '' }} inline-block menu menu-hover navbar-item"
            href="{{ route('main.order.index', ['status' => 'batal']) }}">
            Batal
        </a>
    </div>

    <div class="py-2 overflow-x-auto mt-4">
        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th
                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Tanggal</th>

                        <th
                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Produk</th>

                        <th
                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Status</th>

                        <th
                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Total</th>

                        <th
                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">

                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white">
                    @if ($orders->count() > 0)
                    @foreach ($orders as $order)
                    <x-main.order-tr :order="$order" />
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5">
                            <div class="flex justify-center flex-col p-4 space-y-6">
                                <img class="h-48" src="{{ asset('/img/empty.svg') }}" alt="">
                            </div>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection