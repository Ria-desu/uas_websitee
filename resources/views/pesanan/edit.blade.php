@extends('layouts.master')
@section('title', 'Edit Pesanan')
@section('content')

<div class="container mx-auto px-4 py-6">
    <h1 class="text-xl font-bold mb-4">Edit Pesanan</h1>

    <form action="{{ route('pesanan.update', $pesanan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="space-y-4">
            <div class="form-group">
                <label for="nama_pembeli" class="block">Nama Pembeli</label>
                <input type="text" name="nama_pembeli" id="nama_pembeli" class="w-full p-2 border border-gray-300 rounded-md" value="{{ old('nama_pembeli', $pesanan->nama_pembeli) }}" required>
            </div>

            <div class="form-group">
                <label for="barang_id" class="block">Pilih Barang</label>
                <select name="barang_id" id="barang_id" class="w-full p-2 border border-gray-300 rounded-md" required>
                    <option value="">Pilih Barang</option>
                    @foreach ($barang as $item)
                        <option value="{{ $item->id }}" {{ $pesanan->barang_id == $item->id ? 'selected' : '' }}>{{ $item->nama_barang }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="harga" class="block">Harga</label>
                <input type="number" name="harga" id="harga" class="w-full p-2 border border-gray-300 rounded-md" value="{{ old('harga', $pesanan->harga) }}" required>
            </div>

            <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded-md hover:bg-yellow-600">Update</button>
            <a href="{{ route('pesanan.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600">Kembali</a>
        </div>
    </form>
</div>

@endsection
