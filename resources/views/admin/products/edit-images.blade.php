@extends('layouts.admin.app')

@section('title', 'Edit Foto Produk')

@section('content')

    <div x-data="{modalAddImageShow : false}">
        @if ($images->count() < 5)
            <button x-on:click="modalAddImageShow = true" class="btn btn-green hover-darken-green mt-4">
                Tambah Foto
            </button>
        @endif

        @if (session()->has('message'))
            <div class="p-4 w-full bg-green-200 mt-4 rounded text-green-700">
                <span>{{ session()->get('message') }}</span>
            </div>
        @endif

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
                                        Foto Produk</th>

                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white">
                                @foreach ($images as $image)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="whitespace-nowrap text-sm leading-5 text-gray-900">
                                                <img class="rounded-lg h-20 w-32 object-cover"
                                                    src="{{ asset('storage/img/products/') . '/' . $image->name }}"
                                                    alt="">
                                            </div>
                                        </td>

                                        <td
                                            class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                            <div class="flex justify-end space-x-2 text-white text-xs font-semibold">
                                                {{-- <button
                                                    class="py-1 px-3 rounded hover:bg-yellow-700 bg-yellow-500">Edit</button> --}}

                                                @if ($image->is_primary == 1)
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>
                                                @else
                                                    <form method="POST"
                                                        action="{{ route('admin.products.images.set_primary', ['product' => $image->product->id, 'productImage' => $image->id]) }}">
                                                        @method('PUT')
                                                        @csrf
                                                        <button type="submit"
                                                            class="whitespace-nowrap py-1 px-3 rounded hover:bg-blue-700 bg-blue-500">Foto
                                                            Utama</button>
                                                    </form>
                                                @endif

                                                <form method="POST"
                                                    action="{{ route('admin.products.images.destroy', ['productImage' => $image->id]) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button onclick="return confirm('Hapus item ini?')" type="submit"
                                                        class="py-1 px-3 rounded hover:bg-red-700 bg-red-500">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="modalAddImageShow">
            <div class="fixed z-40 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 bg-gray-800 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                    <!-- This element is to trick the browser into centering the modal contents. -->
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                        <form action="{{ route('admin.products.images.add', ['product' => $images[0]->product->id]) }}"
                            enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="mt-3 text-center sm:mt-0 sm:text-left">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                        Tambah Foto
                                    </h3>

                                    <div class="mt-3">
                                        <input accept="image/*" required class="w-full" type="file" name="image">
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button type="submit"
                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                    Submit
                                </button>

                                <button x-on:click="modalAddImageShow = !modalAddImageShow" type="button"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                    Batal
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
