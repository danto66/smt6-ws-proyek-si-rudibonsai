@extends('layouts.admin.app')

@section('title', 'Daftar Produk')

@section('content')

    <button class="btn btn-green hover-darken-green mt-4">
        Tambah Produk
    </button>

    <div class="flex flex-col mt-4">
        <div class="lg:px-8 sm:px-6">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 lg:-mx-8 ">
                <div
                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th
                                    class="whitespace-nowrap px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Produk</th>

                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Harga</th>

                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Kategori</th>

                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Stok</th>

                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Dimensi</th>

                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            <x-product.tr />
                            <x-product.tr />
                            <x-product.tr />
                            <x-product.tr />
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
