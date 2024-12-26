<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        $data = Kategori::all();
        return view('kategori.index', ['dataKategori'=> $data]);
    }

    public function create(){
        return view('kategori.create');
    }

    public function store(Request $request){

        $message = [
            'required' => 'atribute tidak boleh kosong',
            'unique' => 'atribute sudah digunakan',
            'numeric'=> 'atibute harus berupa angka'
        ]; 
        $validatedData = $request->validate([
            'id' => 'required|numeric|unique:kategori',
            'nama_kategori' => 'required|unique:kategori',

        ],$message);

        $data = new Kategori();
        $data->id = $request->id;
        $data->nama_kategori = $request->nama_kategori;
        $data->save();
        return redirect('/tampil-kategori')->with('success','Data Berhasil Ditambahkan');
    }

    public function edit($id){
        $data = Kategori::find($id);
        return view('kategori.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $data = Kategori::find($id);
        $data->nama_kategori = $request->nama_kategori;
        $data->update();
        return redirect('/tampil-kategori')->with('success','Data Berhasil Diubah');
    }

    public function destroy($id){
        $data = Kategori::find($id);
        $data->delete();
        return redirect('/tampil-kategori')->with('success','Data Berhasil Dihapus');
    }
}
