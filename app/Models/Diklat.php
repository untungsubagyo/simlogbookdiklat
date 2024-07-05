<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diklat extends Model
{
    use HasFactory;
    protected $fillable = [
        "nama_diklat", "penyelenggara", "tingkatan_diklat",
        "jumlah_jam", "no_sertifikat", "tanggal_sertifikat",
        "tahun_penyelenggara", "tempat", "tanggal_mulai",
        "tanggal_selesai", "no_sk_penugasan", "tanggal_sk_penugasan",
        "id_jenis_diklat", "id_kategori_kegiatan_diklat", "id_dokumen"
    ];
}
