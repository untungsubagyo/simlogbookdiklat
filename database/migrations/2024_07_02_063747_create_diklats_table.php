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
        Schema::create('diklats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_diklat', 50);
            $table->string('penyelenggara', 50);
            $table->enum('tingkatan_diklat', ['lokal', 'regional', 'nasional', 'internasional']);
            $table->integer('jumlah_jam');
            $table->string('no_sertifikat');
            $table->date('tangal_sertifikat');
            $table->string('tahun_penyelenggaraan', 4);
            $table->string('tempat_penyelenggaraan', 255);
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('no_sk_penugasan');
            $table->date('tanggal_sk_penugasan');
            $table->integer('jenis_diklat_id');
            $table->integer('kegiatan_diklat_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diklats');
    }
};
