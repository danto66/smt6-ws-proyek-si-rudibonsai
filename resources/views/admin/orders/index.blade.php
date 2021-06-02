@extends('layouts.admin.app')

@section('title', 'Daftar Pesanan')

@section('content')
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
                            Alamat</th>

                        <th
                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">

                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white">
                    @if ($orders->count() > 0)
                        @foreach ($orders as $order)
                            <x-admin.order-tr :order="$order" />
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
@endsection
