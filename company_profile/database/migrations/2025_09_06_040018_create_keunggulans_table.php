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
        Schema::create('keunggulans', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable();      // bisa simpan path gambar/icon atau nama class icon
            $table->string('title');                 // judul keunggulan
            $table->text('description')->nullable(); // deskripsi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keunggulans');
    }
};