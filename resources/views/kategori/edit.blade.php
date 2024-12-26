@extends('layouts.master')
@section('title', 'Aplikasi Laravel')
@section('content')

<div class="container mx-auto px-4">
    <div class="max-w-md mx-auto bg-white p-6 shadow-md rounded-lg">
        <h4 class="text-xl font-bold mb-4">Edit Data Kategori</h4>
        <form action="{{ route('kategori.update', $data->id) }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="id" class="block text-gray-700 font-medium mb-2">Kode Kategori <span class="text-red-500">*</span></label>
                <input type="text" name="id" id="id" value="{{ $data->id }}" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="nama_kategori" class="block text-gray-700 font-medium mb-2">Nama Kategori <span class="text-red-500">*</span></label>
                <input type="text" name="nama_kategori" id="nama_kategori" value="{{ $data->nama_kategori }}" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="flex justify-between items-center mt-4">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Ubah</button>
                <a href="{{ url('kategori') }}" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
