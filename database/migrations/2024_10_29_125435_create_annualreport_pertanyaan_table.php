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
        Schema::create('annualreport_pertanyaan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_annualreport');
            $table->string('name');
            $table->string('email');
            $table->string('company');
            $table->string('phone');
            $table->string('subject');
            $table->text('message');
            $table->enum('status', ['unread', 'read', 'replied'])->default('unread');
            $table->timestamp('replied_at')->nullable();
            $table->integer('replied_by')->nullable();
            $table->text('reply')->nullable();
            $table->text('reply_attachment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annualreport_pertanyaan');
    }
};
