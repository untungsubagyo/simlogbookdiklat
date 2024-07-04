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
        Schema::create('jenis_diklats', function (Blueprint $table) {
            $table->id();
            $table->string('nama',50);
            $table->enum('jenis_diklat', ['Pelatihan Profesional', 'Lemhanas', 'Diklat Prajabatan', 'Diklat Kepemimpinan', 'Academic Exchange']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_diklats');
    }
};