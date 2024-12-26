<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang', function(Blueprint $table){
            $table->id();
            $table->string('merk', 100);
            $table->string('warna', 100);
            $table->string('harga', 100);
            $table->string('stok', 255);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExist('barang');
    }
};
