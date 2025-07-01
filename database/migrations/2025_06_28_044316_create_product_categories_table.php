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
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Nama kategori
            $table->string('slug')->unique(); // Slug untuk URL
            $table->text('description')->nullable(); // Deskripsi opsional
            $table->string('image')->nullable(); // Gambar kategori
            $table->foreignId('parent_id')->nullable()->constrained('product_categories')->nullOnDelete(); // Subkategori opsional
            $table->enum('status', ['active', 'inactive'])->default('active'); // Status
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_categories');
    }
};
