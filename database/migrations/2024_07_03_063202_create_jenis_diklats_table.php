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

        DB::table('jenis_diklats')->insert([
            [
                "nama" => "something", 
                "jenis_diklat" => "Pelatihan Profesional", 
                "created_at" => "2024-07-14 21:47:30", 
                "updated_at" => "2024-07-14 21:47:30",
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_diklats');
    }
};