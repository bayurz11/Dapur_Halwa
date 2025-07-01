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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk', 150);
            $table->string('slug')->unique();
            $table->foreignId('kategori_id')->constrained('product_categories')->onDelete('cascade');
            $table->text('deskripsi')->nullable();
            $table->text('komposisi')->nullable();
            $table->integer('harga');
            $table->integer('berat')->nullable(); // gram
            $table->string('satuan', 50)->default('pcs');
            $table->integer('stok')->default(0);
            $table->string('foto_utama')->nullable();
            $table->json('foto_lainnya')->nullable(); // untuk menyimpan array foto
            $table->float('rating', 2, 1)->default(0); // contoh: 4.5
            $table->enum('status', ['aktif', 'tidak_aktif'])->default('aktif');
            $table->integer('promo')->nullable(); // potongan harga jika ada
            $table->boolean('produk_terlaris')->default(false);
            $table->boolean('tampilkan_di_beranda')->default(false);
            $table->date('tanggal_kadaluarsa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
