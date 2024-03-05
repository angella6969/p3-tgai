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

            // 'nama' => ['nullable'],
            // 'email' => ['nullable'],
            // 'nik' => ['nullable'],
            // 'nohp' => ['nullable'],
            // 'alamatktp' => ['nullable'],
            // 'alamatdomisili' => ['nullable'],
            // 'lamaran' => ['file', 'max:5120', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            // 'ijasa' => ['file', 'max:5120', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            // 'pernyataan' => ['file', 'max:5120', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            // 'cv' => ['file', 'max:5120', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            // 'ktp' => ['file', 'max:5120', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            // 'sim' => ['file', 'max:5120', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            // 'npwp' => ['file', 'max:5120', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('nama')->nullable();
            $table->string('nik')->nullable();
            $table->string('nohp')->nullable();
            $table->string('status')->nullable();
            $table->string('alamatktp')->nullable();
            $table->string('email')->nullable();
            $table->string('alamatdomisili')->nullable();
            $table->string('lamaran')->nullable();
            $table->string('ijasa')->nullable();
            $table->string('pernyataan')->nullable();
            $table->string('cv')->nullable();
            $table->string('ktp')->nullable();
            $table->string('npwp')->nullable();
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
