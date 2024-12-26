<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table  = 'Pesanan';

    protected $fillable = ['nama_pembeli', 'barang_id', 'ukuran_id', 'harga', 'tanggal_pesan','jumlah']; // Tambahkan tanggal_pesan

    // Relasi dengan model Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class);
  
    }


    // Casting tanggal_pesan ke Carbon
    protected $casts = [
        'tanggal_pesan' => 'datetime', // Ini akan mengkonversi tanggal_pesan menjadi instance Carbon
    ];
}