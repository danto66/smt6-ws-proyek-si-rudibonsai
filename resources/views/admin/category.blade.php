@extends('layouts.admin.app')

@section('title', 'Kategori Produk')

@section('content')
    <div
        x-data="{modalCategoryShow:false, inputCategoryValue:null, inputCategoryId:null, modalTitle:null, actionPost:true}">
        <button
            x-on:click="modalCategoryShow = true; modalTitle = 'Tambah Kategori'; inputCategoryValue = null; inputCategoryId = null; actionPost = true;"
            class="btn btn-green hover-darken-green mt-4">
            Tambah Kategori
        </button>

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
                                        Kategori</th>

                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white">

                                @foreach ($categories as $category)
                                    <x-admin.category-tr :name="$category->name" :id="$category->id" />
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                {{ $categories->links() }}
            </div>
        </div>

        <!-- This example requires Tailwind CSS v2.0+ -->
        <div x-show="modalCategoryShow">
            <div class="fixed z-40 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 bg-gray-800 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                    <!-- This element is to trick the browser into centering the modal contents. -->
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">

                        <form method="POST"
                            x-bind:action="(actionPost ? '{{ route('admin.categories.store') }}' : ('{{ url('admin/categories') . '/' }}' + inputCategoryValue))">
                            <input x-bind:disabled="actionPost" type="hidden" name="_method" value="PUT">

                            @csrf
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="mt-3 text-center sm:mt-0 sm:text-left">
                                    <h3 x-text="modalTitle" class="text-lg leading-6 font-medium text-gray-900"
                                        id="modal-title">
                                    </h3>

                                    <div class="mt-3">

                                        <input required class="w-full" type="text" name="name"
                                            x-bind:value="inputCategoryValue !== null ? inputCategoryValue : '' ">
                                        <input type="hidden" name="id"
                                            x-bind:value="inputCategoryId !== null ? inputCategoryId : ''">

                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button type="submit"
                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">
                                    Submit
                                </button>

                                <button x-on:click="modalCategoryShow = !modalCategoryShow" type="button"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
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
