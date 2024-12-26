@extends('layouts.master')
@section('title', 'Aplikasi Laravel')
@section('content')

<br>
<div class="container mx-auto px-4">
    <div class="max-w-md mx-auto bg-white p-6 shadow-md rounded-lg">
        <h4 class="text-xl font-bold mb-4">Form Input Data</h4>

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

        <form action="{{ route('kategori.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="id" class="block text-gray-700 font-medium mb-2">Kode Kategori <span class="text-red-500">*</span></label>
                <input type="text" name="id" id="id" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="nama_kategori" class="block text-gray-700 font-medium mb-2">Nama Kategori <span class="text-red-500">*</span></label>
                <input type="text" name="nama_kategori" id="nama_kategori" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="flex justify-between items-center mt-4">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Simpan</button>
                <a href="{{ route('kategori.store') }}" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600">Kembali</a>
            </div>
        </form>
    </div>
</div>

@endsection
