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
        Schema::create('about_visimisi', function (Blueprint $table) {
            $table->id();
            $table->string('headline')->nullable();
            $table->text('visi_title')->nullable();
            $table->text('visi_description')->nullable();
            $table->text('misi_title')->nullable();
            $table->text('misi_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_visimisi');
    }
};
