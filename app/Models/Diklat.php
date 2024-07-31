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
        "nama_jenis_diklat", "jenis_diklat", "id_kategori_kegiatan_diklat", "id_jenis_dokumen",
        "id_user", "file_dokumen", "nama_dokumen",
        "link_dokumen", "keterangan_dokumen"
    ];
    public $timestamps = true;
}
