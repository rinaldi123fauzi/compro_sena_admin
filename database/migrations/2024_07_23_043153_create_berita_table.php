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
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->integer('kategori_berita_id');
            $table->string('judul');
            $table->string('judul_en');
            $table->string('slug');
            $table->string('slug_en');
            $table->string('image');
            $table->text('deskripsi');
            $table->text('deskripsi_en');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
