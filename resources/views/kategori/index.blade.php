@extends('layouts.master')
@section('title', 'Aplikasi Laravel')
@section('content')

<style>
    .tambah{
        background-color:rgb(20, 155, 148);

    }

    .ya{
        background-color:rgb(84, 140, 177);
    }
</style>
<br>
<div class="container mx-auto px-4">
    <h2 class="text-2xl font-semibold mb-4">Tabel Kategori</h2>
    <a href="{{ route('kategori.create') }}" class="tambah text-white px-4 py-2 rounded hover:bg-green-600">+ Tambah Data</a>
    <div class="overflow-x-auto mt-6">
        <table class="table-auto border-collapse w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr class="ya text-white">
                    <th class="border px-4 py-2">No.</th>
                    <th class="border px-4 py-2">Kode Kategori</th>
                    <th class="border px-4 py-2">Nama Kategori</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataKategori as $data)
                <tr class="text-center hover:bg-gray-100">
                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border px-4 py-2">{{ $data->id }}</td>
                    <td class="border px-4 py-2">{{ $data->nama_kategori }}</td>
                    <td class="border px-4 py-2">
                        <form action="{{ route('kategori.delete', $data->id) }}" method="post">
                            @csrf
                            <a href="{{ route('kategori.edit', $data->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Ubah</a>
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
