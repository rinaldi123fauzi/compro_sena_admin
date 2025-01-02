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
        Schema::create('header', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('header_about_us_image');
            $table->string('header_about_us_text');
            $table->string('header_about_us_text_en');

            $table->string('header_capability_image');
            $table->string('header_capability_text');
            $table->string('header_capability_text_en');

            $table->string('header_experience_image');
            $table->string('header_experience_text');
            $table->string('header_experience_text_en');

            $table->string('header_contact_us_image');
            $table->string('header_contact_us_text');
            $table->string('header_contact_us_text_en');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('header');
    }
};
