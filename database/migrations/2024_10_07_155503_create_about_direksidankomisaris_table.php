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
        Schema::create('about_direksidankomisaris', function (Blueprint $table) {
            $table->id();
            $table->string('iamge')->nullable();
            $table->string('name')->nullable();
            $table->string('position')->nullable();
            $table->enum('type', ['direksi', 'komisaris'])->default('direksi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_direksidankomisaris');
    }
};
