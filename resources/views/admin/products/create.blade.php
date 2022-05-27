@extends('layouts.admin.app')

@section('title', isset($product) ? 'Edit Produk' : 'Tambah Produk')

@section('content')

<div class="flex flex-col mt-4">
    <div class="lg:px-8 sm:px-6">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 lg:-mx-8 ">
            <div
                class="sm:p-6 p-4 align-middle inline-block w-full md:w-8/12 shadow overflow-hidden sm:rounded-lg border-b border-gray-200 bg-white">
                <form enctype="multipart/form-data" method="POST"
                    action="{{ isset($product) ? route('admin.products.update', ['product' => $product->id]) : route('admin.products.store') }}">
                    @if (isset($product))
                    @method('PUT')
                    @endif

                    @csrf

                    @if ($errors->any())
                    <div class="mt-4">
                        <div class="font-medium text-red-600">
                            {{ __('Whoops! Something went wrong.') }}
                        </div>

                        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if (session()->has('message'))
                    <div
                        class="mt-4 p-4 w-full {{ session()->get('status') == 'alert' ? 'bg-red-200 text-red-700' : ' bg-green-200 rounded text-green-700' }} ">
                        <span>{{ session()->get('message') }}</span>
                    </div>
                    @endif

                    <div class="mt-4">
                        <x-label for="name" value="Nama Produk" />

                        <x-input value="{{ isset($product) ? $product->name : '' }}" id="name" class="block mt-1 w-full"
                            type="text" name="name" required />
                    </div>

                    <div class="flex flex-col sm:flex-row sm:space-x-2 flex-shrink">
                        <div class="mt-4 w-full">
                            <x-label for="price" value="Harga Produk" />

                            <div class="rounded-md mt-1 flex flex-row justify-center bg-gray-300">
                                <div class="p-2 text-gray-600 font-semibold">
                                    Rp
                                </div>

                                <x-input value="{{ isset($product) ? $product->price : '' }}" id="price"
                                    class="block w-full" type="number" name="price" required />
                            </div>
                        </div>

                        <div class="mt-4 w-full">
                            <x-label for="stock" value="Stok Produk" />

                            <x-input value="{{ isset($product) ? $product->stock : '' }}" id="stock"
                                class="block mt-1 w-full" type="number" name="stock" required />
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:space-x-2 flex-shrink">
                        <div class="mt-4 w-full">
                            <x-label for="length" value="Panjang" />

                            <div class="rounded-md mt-1 flex flex-row justify-center bg-gray-300">
                                <x-input value="{{ isset($product) ? $product->length : '' }}" id="length"
                                    class="block w-full" type="number" name="length" required />

                                <div class="p-2 text-gray-600 font-semibold">
                                    cm
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 w-full">
                            <x-label for="width" value="Lebar" />

                            <div class="rounded-md mt-1 flex flex-row justify-center bg-gray-300">
                                <x-input value="{{ isset($product) ? $product->width : '' }}" id="width"
                                    class="block w-full" type="number" name="width" required />

                                <div class="p-2 text-gray-600 font-semibold">
                                    cm
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:space-x-2 flex-shrink">
                        {{-- <div class="mt-4 w-full">
                            <x-label for="height" value="Tinggi" />

                            <div class="rounded-md mt-1 flex flex-row justify-center bg-gray-300">
                                <x-input value="{{ isset($product) ? $product->height : '' }}" id="height"
                                    class="block w-full" type="number" name="height" required />

                                <div class="p-2 text-gray-600 font-semibold">
                                    cm
                                </div>
                            </div>
                        </div> --}}

                        <div class="mt-4 w-full">
                            <x-label for="weight" value="Berat" />

                            <div class="rounded-md mt-1 flex flex-row justify-center bg-gray-300">
                                <x-input value="{{ isset($product) ? $product->weight : '' }}" id="weight"
                                    class="block w-full" type="number" name="weight" required />

                                <div class="p-2 text-gray-600 font-semibold">
                                    gram
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <x-label for="product_category_id" value="Kategori Produk" />

                        <x-select name="product_category_id" required>
                            <option value="">--Pilih Kategori--</option>

                            @if (isset($product))
                            @foreach ($categories as $category)
                            <option {{ $category->id == $product->productCategory->id ? 'selected' : '' }}
                                value=" {{ $category->id }} "> {{ $category->name }} </option>
                            @endforeach

                            @else
                            @foreach ($categories as $category)
                            <option value=" {{ $category->id }} "> {{ $category->name }} </option>
                            @endforeach
                            @endif
                        </x-select>
                    </div>

                    @if (!isset($product))
                    <div x-data="inputImageFiles()" class="mt-4">
                        <x-label for="images" value="Foto Produk" />

                        <input x-on:change="showAlertLimit()" accept="image/*" class="mt-1 block" type="file"
                            name="images[]" id="images" multiple {{ isset($product) ? '' : 'required' }}>
                    </div>
                    @endif

                    <div class="mt-4">
                        <x-label for="description" value="Deskripsi" />

                        <textarea required class="block mt-1 w-full" name="description"
                            id="description">{{ isset($product) ? $product->description : '' }}</textarea>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-primary hover-darken-primary">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function inputImageFiles() {
            return {
                showAlertLimit() {
                    let images = document.getElementById('images');
                    let fileImage = images.files;
                    // console.log(fileImage.length);

                    if (fileImage.length > 5) {
                        alert("File maksimal 5.");
                        images.value = '';
                    }
                }
            }
        }

</script>

@endsection