<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisDiklat extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 
        'jenis_diklat',
    ];
}