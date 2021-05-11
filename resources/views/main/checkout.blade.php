@extends('layouts.main.app')

@section('content')
    <div x-data="checkout()"
        x-init="setData({{ $profile->city_id }}, {{ $cart_data['total_weight'] }}, {{ $cart_data['subtotal'] }})"
        class="mt-6 px-2 sm:px-8 xl:px-4 max-w-7xl mx-auto min-h-screen">
        <div class="text-gray-900 font-semibold sm:text-3xl text-xl border-b-4 border-green-500 py-2">
            Checkout
        </div>

        {{-- body --}}
        <div class="mt-4 flex flex-col sm:flex-row sm:space-x-4">
            {{-- card bagian kiri --}}
            <div class="bg-white sm:w-8/12 shadow rounded-xl p-4">
                <div class="border-b-2 pb-3">
                    <h1 class="font-semibold text-lg">
                        Alamat Pengiriman
                    </h1>

                    <div class="mt-1">
                        <p class="text-sm">
                            {{ $profile->fullname }}
                        </p>

                        <p class="text-sm">
                            {{ $profile->phone }}
                        </p>

                        <p class="text-sm">
                            {{ auth()->user()->email }}
                        </p>
                    </div>

                    <div class="mt-2">
                        <p class="text-sm">
                            <span>{{ $profile->province->province_name }}, </span>
                            <span>{{ $profile->city->city_name }}, </span>
                            <span>{{ $profile->subdistrict->subdistrict_name }}</span>
                        </p>

                        <p class="text-sm">
                            {{ $profile->address_detail }}
                        </p>
                    </div>

                    <div class="mt-4 flex">
                        <a class="ml-auto btn-sm btn-outline-green hover-green" href="">Ubah Alamat</a>
                    </div>
                </div>

                <div class="mt-4 border-b-2 pb-3">
                    <h1 class="font-semibold text-lg">
                        Metode Pengiriman
                    </h1>

                    <div class="mt-1 text-sm">
                        <x-select x-model="courier" x-on:change="getCourier(); isValid=false;">
                            <option value="">--Pilih Kurir--</option>
                            <option value="jne">JNE</option>
                            <option value="pos">Pos Indonesia</option>
                            <option value="tiki">TIKI</option>
                        </x-select>
                    </div>

                    <div :class="{'animate-pulse' : isLoading}" class="mt-1 text-sm">
                        <x-select x-on:change="splitShippingRes(); setTotal(); isValid=true;" x-model="shippingRes"
                            x-bind:disabled="isDisable">
                            <option value="">--Pilih Jenis Layanan--</option>
                            <template x-for="res in results">
                                <option :value="`${res.cost[0].value}|${res.service}`"
                                    x-text="`${res.service} (${setCurrencyFormat(res.cost[0].value)}) | ${res.cost[0].etd}` + (courier !== 'pos' ? ' Hari' : '')">
                                </option>
                            </template>
                        </x-select>
                    </div>
                </div>

                <div class="mt-4 border-b-2 pb-3">
                    <h1 class="font-semibold text-lg">
                        Metode Pembayaran
                    </h1>

                    <div class="p-2 border-2 rounded-md mt-1">
                        <p class="font-semibold text-gray-500"> Transfer Bank </p>
                        <p class="text-lg py-1 text-center rounded-md bg-green-100 font-semibold"> BRI : 098098098 </p>
                    </div>
                </div>

                <div x-data="{showItem:false}" class="mt-4">
                    <h1 class="font-semibold text-lg flex justify-between">
                        <span>Item</span>

                        <button @click="showItem = !showItem" class="focus:outline-none">
                            <i class="my-auto fa fa-chevron-down"
                                :class="showItem ? 'rotate-180 transform duration-300': 'rotate-0 transform duration-300'"></i>
                        </button>
                    </h1>

                    <div x-show.transition="showItem" class="p-2 border-2 rounded-md mt-1">
                        @foreach ($items as $item)
                            <x-main.checkout-item :item="$item" :qty="$cart_data['qty'][$loop->index]" />
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- card bagian kanan --}}
            <div class="bg-white block h-full mt-4 sm:mt-0 sm:w-4/12 p-4 shadow rounded-xl">
                <div class="border-b-2 pb-2">
                    <div class="text-sm font-semibold  flex justify-between sm:flex-col">
                        <p class="whitespace-nowrap text-gray-400">
                            Subtotal <span>({{ $cart_data['total_item'] }} item)</span>
                        </p>
                        <span x-text="setCurrencyFormat(subtotal)" class="text-gray-600 ml-auto"></span>
                    </div>

                    <div class="sm:mt-1 text-sm font-semibold flex justify-between sm:flex-col">
                        <p class="whitespace-nowrap text-gray-400">Ongkos Kirim</p>
                        <span x-text="shippingCost" class="text-gray-600 ml-auto"></span>
                    </div>

                    <div class="mt-2 text-sm font-bold text-black flex justify-between sm:flex-col">
                        <p>TOTAL</p>
                        <span x-text="setCurrencyFormat(total)" class="sm:ml-auto"></span>
                    </div>
                </div>

                <form method="POST" action="{{ route('main.checkout.store') }}">
                    @csrf
                    <input type="hidden" name="shipping_cost" x-model="shippingCost">
                    <input type="hidden" name="product_total_amount" x-model="subtotal">
                    <input type="hidden" name="grand_total_amount" x-model="total">
                    <input type="hidden" name="quantity_total" value="{{ $cart_data['total_item'] }}">
                    <input type="hidden" name="shipping_agent" x-model="courier">
                    <input type="hidden" name="shipping_service" x-model="shippingService">

                    @foreach ($cart_data['qty'] as $qty)
                        <input type="hidden" name="qty[]" value="{{ $qty }}">
                    @endforeach

                    <button :disabled="!isValid" :class="{'disabled' : !isValid}" type="submit"
                        class="mt-4 w-full btn-sm btn-green hover-darken-green">Buat
                        Pesanan</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function checkout() {
            return {
                isValid: false,
                origin: '74', // blitar
                destination: '', // diisi lewat setData()
                weight: '', // diisi lewat setData()
                courier: '', // diisi oleh x-model
                url: "http://127.0.0.1:8000/api/get-cost",
                key: "7669999eb1b0e20356e111f4adaee232",
                results: [],
                isDisable: true,
                isLoading: false,
                shippingCost: 0,
                shippingService: '',
                shippingRes: '',
                total: 0,
                subtotal: 0,
                setData(destination, weight, subtotal) {
                    this.destination = destination;
                    this.weight = weight;
                    this.subtotal = subtotal;
                },
                resetData() {
                    this.results = [];
                    this.isDisable = true;
                    this.shippingCost = 0;
                    this.total = 0;
                },
                getCourier() {
                    this.isLoading = true;
                    this.resetData();
                    if (this.courier === '') return;
                    this.fetchCourier();
                },
                fetchCourier() {
                    fetch(`${this.url}/${this.courier}/${this.destination}/${this.weight}`)
                        .then(res => res.json())
                        .then(data => {
                            this.results = [...data.rajaongkir.results[0].costs];
                            console.log(this.results);
                            this.isDisable = false;
                            this.isLoading = false;
                        })
                        .catch(e => {
                            console.log(e)
                        });
                },
                setCurrencyFormat(number) {
                    return new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                    }).format(number);
                },
                setTotal() {
                    this.total = parseInt(this.subtotal) + parseInt(this.shippingCost);
                },
                splitShippingRes() {
                    const [cost, service] = this.shippingRes.split('|');

                    this.shippingCost = cost;
                    this.shippingService = service;
                }
            }
        }

    </script>

@endsection
