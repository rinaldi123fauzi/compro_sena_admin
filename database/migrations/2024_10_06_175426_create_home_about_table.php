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
        Schema::create('home_about', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('link_video')->nullable();
            $table->string('sub_headline')->nullable();
            $table->string('main_headline')->nullable();
            $table->string('description')->nullable();

            $table->string('link_video_eng')->nullable();
            $table->string('sub_headline_eng')->nullable();
            $table->string('main_headline_eng')->nullable();
            $table->string('description_eng')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_about');
    }
};
