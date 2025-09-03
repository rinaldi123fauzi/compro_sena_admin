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
        Schema::create('home_slider', function (Blueprint $table) {
            $table->id();
            $table->text('primary_text');
            $table->text('primary_text_eng');
            $table->text('description');
            $table->text('description_eng');
            $table->string('file_video')->nullable();
            $table->string('url_video')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_slider');
    }
};
