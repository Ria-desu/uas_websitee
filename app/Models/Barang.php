<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'merk', 'ukuran', 'warna', 'harga', 'stok'];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
