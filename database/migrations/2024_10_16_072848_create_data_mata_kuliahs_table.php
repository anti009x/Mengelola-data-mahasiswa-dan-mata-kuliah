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
        Schema::create('data_mata_kuliahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mata_kuliah');
            $table->string('kode_mata_kuliah')->unique();
            $table->integer('sks');
            $table->string('semester');
            $table->string('nama_dosen')->nullable();
            $table->string('nama_file');
            $table->string('path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_mata_kuliahs'); // Perbaiki nama tabel di sini
    }
};
