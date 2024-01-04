<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_categories'; // Nama tabel dalam database
    protected $primaryKey = 'id';
    protected $fillable = ['id','name', 'slug', 'status', 'id_kategori']; // Kolom yang dapat diisi

    // Relasi dengan tabel kategori (jika diperlukan)
    public function category()
    {
        return $this->belongsTo(Category::class,'id_kategori');
    }
}
