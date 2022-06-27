@extends('layouts.admin.app')

@section('title', 'Laporan ')

@section('content')

<div class="mt-4 flex">
    <form action="">
        <select name="month" id="">
            <option value="">--Bulan--</option>
            @foreach ($months as $month)
            <option value="{{$month['id']}}"> {{$month['value']}} </option>
            @endforeach
        </select>

        <select name="year" id="">
            <option value="">--Tahun--</option>
            @foreach ($years as $year)
            <option value="{{$year}}"> {{$year}} </option>
            @endforeach
        </select>

        <button type="submit" class="ml-2 btn btn-primary hover-darken-primary">Submit</button>
    </form>

    <a href="{{ route('admin.reports.index') }}" class="btn btn-outline-primary hover-primary ml-2">Reset</a>
</div>

<div class="py-2 overflow-x-auto mt-2">
    <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
        <table class="min-w-full">
            <thead>
                <tr>
                    <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Tanggal</th>

                    <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Pelanggan</th>

                    <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Total Harga Produk</th>

                    <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Ongkos Kirim</th>
                    <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Total Bayar</th>

                </tr>
            </thead>

            <tbody class="bg-white">
                @if ($orders->count() > 0)
                @foreach ($orders as $order)
                <x-admin.report-tr :order="$order" />
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