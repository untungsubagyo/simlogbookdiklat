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
        Schema::create('golongans', function (Blueprint $table) {
            $table->id();
            $table->string('golongan', 5)->unique();
            $table->string('pangkat');
            $table->timestamps();
        });

        DB::table('golongans')->insert([
            [
                "golongan" => "ll D",
                "pangkat" => "Pengatur Tingkat 1",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "golongan" => "ll C",
                "pangkat" => "Pengatur",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "golongan" => "lll A",
                "pangkat" => "Penata Muda",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "golongan" => "lll B",
                "pangkat" => "Penata Muda Tingkat 1",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "golongan" => "lll C",
                "pangkat" => "Penata",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "golongan" => "lll D",
                "pangkat" => "Penata Tingkat 1",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "golongan" => "lV A",
                "pangkat" => "Pembina",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "golongan" => "lV B",
                "pangkat" => "Pembina Tingkat 1",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "golongan" => "lV C",
                "pangkat" => "Pembina Utama Muda",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "golongan" => "lV D",
                "pangkat" => "Pembina Utama Madya",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "golongan" => "lV E",
                "pangkat" => "Pembina Utama",
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('golongans');
    }
};
