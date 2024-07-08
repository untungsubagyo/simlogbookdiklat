<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dokumen_diklat extends Model
{
    use HasFactory;
    protected $fillable=[
        'file',
        'nama_dokumen',
        'keterangan',
        'jenis_dokumen_id',
        'link'

    ];
}
