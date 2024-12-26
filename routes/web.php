<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\barang;
use App\Http\Controllers\barangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Auth;

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/homepage');
})->name('logout');


Route::get('/', function () {
    return view('welcome');
});



Route::get('homepage',[barangController::class, 'home']);

Route::get('barang', function() {
    return view('barang');
});

Route::get('tampil-barang', [barangController::class, 'index']);

Route::get('tambah-barang', [barangController::Class, 'create'])->name('barang.create');
Route::post('tampil-barang', [barangController::class, 'store'])->name('barang.store');
Route::get('/barang/edit/{id}', [barangController::class, 'edit'])->name('barang.edit');
Route::post('/barang/edit/{id}', [barangController::class, 'update'])->name('barang.update');
Route::post('/barang/delete/{id}', [barangController::class, 'destroy'])->name('barang.delete');

Route::controller(KategoriController::class)->group(function() {
    Route::get('tampil-kategori', 'index');
    Route::get('tambah-kategori', 'create')->name('kategori.create');
    Route::post('tampil-kategori', 'store')->name('kategori.store');
    Route::get('/kategori/edit/{id}', 'edit')->name('kategori.edit');
    Route::post('/kategori/edit/{id}', 'update')->name('kategori.update');
    Route::post('/kategori/delete/{id}', 'destroy')->name('kategori.delete');
    // Route::get('/produk/export/excel', [ProdukController::class, 'excel'])->name('produk.excel');
    
    // Route::get('/produk/chart', [ProdukController::class, 'chart'])->name('chart');
});


Route::prefix('pesanan')->name('pesanan.')->group(function () {
    Route::get('/', [PesananController::class, 'index'])->name('index'); // Menampilkan daftar pesanan
    Route::get('/create', [PesananController::class, 'create'])->name('create'); // Menampilkan form tambah pesanan
    Route::post('/', [PesananController::class, 'store'])->name('store'); // Proses penyimpanan pesanan baru
    Route::get('/{pesanan}/edit', [PesananController::class, 'edit'])->name('edit'); // Menampilkan form edit pesanan
    Route::put('/{pesanan}', [PesananController::class, 'update'])->name('update'); // Proses update pesanan
    Route::delete('/{pesanan}', [PesananController::class, 'destroy'])->name('destroy'); // Menghapus pesanan
});

Route::get('laporan-penjualan', [PesananController::class, 'Laporan'])->name('laporan.index');
Route::get('/laporan/pdf', [PesananController::class, 'exportPdf'])->name('laporan.pdf');




Route::get('home', function () { 
    return view('home');
});

Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');

// Route::post('/register', [RegisterController::class, 'register'])->name('register');


Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/tampil-barang', [barangController::class, 'index']);
    Route::get('/tambah-barang', [barangController::class, 'create'])->name('barang.create');
    Route::post('/tampil-barang', [barangController::class, 'store'])->name('barang.store');
    Route::get('/barang/edit/{id}', [barangController::class, 'edit'])->name('barang.edit');
    Route::post('/barang/edit/{id}', [barangController::class, 'update'])->name('barang.update');
    Route::post('/barang/delete/{id}', [barangController::class, 'destroy'])->name('barang.delete');

});

Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/tampil-kategori', [KategoriController::class, 'index']);
    Route::get('/tambah-kategori', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/tampil-kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::post('/kategori/edit/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::post('/kategori/delete/{id}', [KategoriController::class, 'destroy'])->name('kategori.delete');

});

Route::prefix('pesanan')->name('pesanan.')->middleware('admin')->group(function () {
    Route::get('/', [PesananController::class, 'index'])->name('index'); // Menampilkan daftar pesanan
    Route::get('/create', [PesananController::class, 'create'])->name('create'); // Menampilkan form tambah pesanan
    Route::post('/', [PesananController::class, 'store'])->name('store'); // Proses penyimpanan pesanan baru
    Route::get('/{pesanan}/edit', [PesananController::class, 'edit'])->name('edit'); // Menampilkan form edit pesanan
    Route::put('/{pesanan}', [PesananController::class, 'update'])->name('update'); // Proses update pesanan
    Route::delete('/{pesanan}', [PesananController::class, 'destroy'])->name('destroy'); // Menghapus pesanan
});


Route::middleware(['auth','pemilik'])->group(function () {
    Route::get('/laporan', [LaporanController::class, 'index']);
    Route::get('/laporan/{id}', [LaporanController::class, 'show']);
});
