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
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('kode_buku');
            $table->string('nama_buku');
            $table->string('penulis');
            $table->string('kategori'); // Perbaiki 'kategory' ke 'kategori'
            $table->string('tahun_rilis')->nullable();
            $table->integer('stok'); // Ubah tipe data 'stok' menjadi integer
            $table->string('ebook_path')->nullable();
            $table->string('cover_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
