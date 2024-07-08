<?php 

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class KategoriKegiatan extends Model
{
    protected $fillable = ['name', 'parent_id'];

    public function children()
    {
        return $this->hasMany(KategoriKegiatan::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(KategoriKegiatan::class, 'parent_id', 'id');
    }
}
