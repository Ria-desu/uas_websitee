@extends('layouts.master')
@section('title', 'Aplikasi Laravel')
@section('content')
<br>

<!-- Flash Message for Success -->
@if ($message = Session::get('success'))
<div class="mb-4 p-4 border-2 border-green-500 bg-green-100 text-green-700 rounded-lg">
    <strong>{{ $message }}</strong>
</div>
@endif

<!-- Flash Message for Errors -->
@if ($errors->any())
<div class="mb-4 p-4 border-2 border-red-500 bg-red-100 text-red-700 rounded-lg">
    <strong>Periksa ulang kesalahan pengisian form</strong>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container mx-auto px-4">
    <div class="max-w-lg mx-auto bg-white p-6 shadow-md rounded-lg">
        <h4 class="text-xl font-bold mb-4">Form Input Data</h4>
        <form action="{{ route('barang.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="id" class="block text-gray-700 font-medium mb-2">Kode Barang <span class="text-red-500">*</span></label>
                <input type="text" name="id" id="id" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="merk" class="block text-gray-700 font-medium mb-2">Merk <span class="text-red-500">*</span></label>
                <input type="text" name="merk" id="merk" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="ukuran" class="block text-gray-700 font-medium mb-2">Ukuran <span class="text-red-500">*</span></label>
                <input type="text" name="ukuran" id="ukuran" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="kategori" class="block text-gray-700 font-medium mb-2">Kategori <span class="text-red-500">*</span></label>
                <select name="kategori" id="kategori" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @foreach ($kategori as $category)
                        <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="warna" class="block text-gray-700 font-medium mb-2">Warna <span class="text-red-500">*</span></label>
                <input type="text" name="warna" id="warna" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="harga" class="block text-gray-700 font-medium mb-2">Harga <span class="text-red-500">*</span></label>
                <input type="text" name="harga" id="harga" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="stok" class="block text-gray-700 font-medium mb-2">Stok <span class="text-red-500">*</span></label>
                <input type="text" name="stok" id="stok" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="flex justify-between items-center mt-4">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Simpan</button>
                <a href="{{ route('barang.store') }}" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
