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
        Schema::create('rekrutmens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('nama')->nullable();
            $table->string('nik')->nullable();
            $table->string('nohp')->nullable();
            $table->string('status')->nullable();
            $table->string('alamat_ktp')->nullable();
            $table->string('email')->nullable();
            $table->string('alamat_dominisil')->nullable();
            $table->string('pdf_lamaran')->nullable();
            $table->string('pdf_ijazah')->nullable();
            $table->string('pdf_ktp')->nullable();
            $table->string('pdf_simAC')->nullable();
            $table->string('pdf_npwp')->nullable();
            $table->string('pdf_pernyataan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekrutmens');
    }
};
