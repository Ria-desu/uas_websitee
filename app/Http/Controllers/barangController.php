<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\barang;
use App\Models\Kategori;

class barangController extends Controller
{
    public function home(){
        return view('layouts.home');
    }
    
    public function index(){
        $data = barang::all();
        return view ('barang.index', ['databarang' => $data]);
    }

    public function create(){
        $kategori = Kategori::all();
        return view('barang.create', compact('kategori'));
    }

    public function store(Request $request){

        $message = [
            'required' => 'atribute tidak boleh kosong',
            'unique' => 'atribute sudah digunakan',
            'numeric'=> 'atibute harus berupa angka'
        ]; 
        $validatedData = $request->validate([
            'id' => 'required|numeric|unique:barang',
            'merk' => 'required:barang',
            'ukuran' => 'required|numeric:barang',
            'warna' => 'required:barang',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ],$message);

        $data = new Barang();
        $data->id = $request->id;
        $data->merk = $request->merk;
        $data->ukuran = $request->ukuran;
        $data->kategori_id = $request->kategori;
        $data->warna = $request->warna;
        $data->harga = $request->harga;
        $data->stok = $request->stok;
        $data->save();
        return redirect('/tampil-barang')->with('success','Data Berhasil Ditambah');
    }

    public function edit($id){
        $data = Barang::find($id); 
        $kategori = Kategori::all();
        return view('barang.edit', compact('data','kategori'));
    }

    public function update(Request $request, $id){
        $data = Barang::find($id);
        $data->merk = $request->merk;
        $data->ukuran =$request->ukuran;
        $data->harga = $request->harga;
        $data->stok = $request->stok;
        $data->warna = $request->warna;
        $data->update();
        return redirect('/tampil-barang')->with('success','Data Berhasil Diubah');
    }

    public function destroy($id){
        $data = Barang::find($id);
        $data->delete();
        return redirect('/tampil-barang')->with('success','Data Berhasil Dihapus');
    }

    public function tambah(){
        $kategori = Kategori::all();
        return view('barang.create', compact('kategori'));
    }

    
}
