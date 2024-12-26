@extends('layouts.master')
@section('title', 'Laporan Penjualan Berdasarkan Barang')

<style>
    .pdf{
        margin-left:10px;
        background-color:rgb(60, 107, 138);
    }

    .terap{
        background-color:rgb(60, 107, 138);
    }

    .ya{
        background-color:rgb(84, 140, 177);
    }
</style>

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-xl font-bold mb-4">Laporan Penjualan Berdasarkan Barang</h1>

        <!-- Filter -->
        <form method="GET" action="{{ route('laporan.index') }}" class="mb-4">
            <div class="flex space-x-4">
                <div>
                    <label for="filter_merk" class="block text-sm font-medium">Filter Merk</label>
                    <select name="merk" id="filter_merk" class="w-full border border-gray-300 rounded-md p-2">
                        <option value="">Semua Merk</option>
                        @foreach ($merkList as $merk)
                            <option value="{{ $merk }}" {{ request('merk') === $merk ? 'selected' : '' }}>{{ $merk }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="filter_bulan" class="block text-sm font-medium">Filter Bulan</label>
                    <select name="bulan" id="filter_bulan" class="w-full border border-gray-300 rounded-md p-2">
                        <option value="">Semua Bulan</option>
                        @foreach ($bulanList as $bulan)
                            <option value="{{ $bulan }}" {{ request('bulan') === $bulan ? 'selected' : '' }}>{{ $bulan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="terap text-white px-6 py-2 rounded-md hover:bg-blue-600">Terapkan</button>
                    <a href="{{ route('laporan.pdf') }}" class="pdf text-white px-6 py-2 rounded-md hover:bg-blue-600" target="_blank">PDF</a>

                </div>

            </div>
        </form>

        <!-- Tabel Laporan -->
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="ya text-white">
                    <th class="border border-gray-300 px-4 py-2">Merk Barang</th>
                    <th class="border border-gray-300 px-4 py-2">Bulan</th>
                    <th class="border border-gray-300 px-4 py-2">Jumlah Terjual</th>
                    <th class="border border-gray-300 px-4 py-2">Total Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalPerBulan = [];
                @endphp
                @forelse ($laporan as $data)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $data->merk }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $data->bulan }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $data->jumlah }}</td>
                        <td class="border border-gray-300 px-4 py-2">Rp {{ number_format($data->pendapatan, 0, ',', '.') }}</td>
                    </tr>
                    @php
                        if (!isset($totalPerBulan[$data->bulan])) {
                            $totalPerBulan[$data->bulan] = [
                                'jumlah' => 0,
                                'pendapatan' => 0
                            ];
                        }
                        $totalPerBulan[$data->bulan]['jumlah'] += $data->jumlah;
                        $totalPerBulan[$data->bulan]['pendapatan'] += $data->pendapatan;
                    @endphp
                @empty
                    <tr>
                        <td colspan="4" class="border border-gray-300 px-4 py-2 text-center">Tidak ada data untuk ditampilkan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Total Penjualan Per Bulan -->
        <div class="mt-6">
            <h2 class="text-lg font-bold mb-2">Total Penjualan Per Bulan</h2>
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="ya text-white">
                        <th class="border border-gray-300 px-4 py-2">Bulan</th>
                        <th class="border border-gray-300 px-4 py-2">Total Jumlah Terjual</th>
                        <th class="border border-gray-300 px-4 py-2">Total Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($totalPerBulan as $bulan => $total)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $bulan }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $total['jumlah'] }}</td>
                            <td class="border border-gray-300 px-4 py-2">Rp {{ number_format($total['pendapatan'], 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
