<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Tentang Kami');
            $table->longText('description')->nullable();
            $table->string('visi_header')->default('Visi');
            $table->longText('visi_content')->nullable();
            $table->string('misi_header')->default('Misi');
            $table->longText('misi_content')->nullable(); // bisa JSON / text dengan bullet
            $table->string('image')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};