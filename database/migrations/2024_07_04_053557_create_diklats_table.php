<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
   /**
    * Run the migrations.
    */
   public function up(): void
   {
      Schema::create('diklats', function (Blueprint $table) {
         $table->id();
         $table->timestamps();
         $table->string('nama_diklat', 50);
         $table->string('penyelenggara', 21);
         $table->enum('tingkatan_diklat', ["Lokal", "Regional", "Nasional", "Internasional"]);
         $table->integer('jumlah_jam');
         $table->string('no_sertifikat', 50);
         $table->date('tanggal_sertifikat');
         $table->string('tahun_penyelenggara', 5);
         $table->text('tempat');
         $table->date('tanggal_mulai');
         $table->date('tanggal_selesai');
         $table->string('no_sk_penugasan', 21);
         $table->date('tanggal_sk_penugasan');

         $table->string('file_dokumen', 500);
         $table->string('nama_dokumen', 100);
         $table->string('link_dokumen', 500)->nullable();
         $table->text('keterangan_dokumen');

         $table->bigInteger('id_jenis_dokumen')->unsigned()->index();
         $table->foreign('id_jenis_dokumen')->references('id')->on('jenis_dokumens')->onDelete('cascade');

         $table->bigInteger('id_user')->unsigned()->index();
         $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

         $table->bigInteger('id_jenis_diklat')->unsigned()->index();
         $table->foreign('id_jenis_diklat')->references('id')->on('jenis_diklats')->onDelete('cascade');

         $table->bigInteger('id_kategori_kegiatan_diklat')->unsigned()->index();
         $table->foreign('id_kategori_kegiatan_diklat')->references('id')->on('kategori_kegiatans')->onDelete('cascade');
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
