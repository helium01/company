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
            $table->string('name'); // Nama produk, ex: Kantong Plastik
            $table->text('description')->nullable(); // Deskripsi produk
            $table->decimal('price', 15, 2)->default(0); // Harga dasar (misal Rp 15.000/kg)
            $table->string('unit')->default('kg'); // Satuan, ex: kg, pcs, pack
            $table->string('image')->nullable(); // Path atau URL gambar produk
            $table->boolean('is_active')->default(true); // Status produk aktif/tidak
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