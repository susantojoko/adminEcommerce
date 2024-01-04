<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'id_kategori';
    protected $table ='tabel_kategori';
    protected $fillable = ['id_kategori','slug','nama_kategori','image', 'status'];

    public function subcategory()
    {
        return $this->hasMany(SubCategory::class,'id_kategori');
    }
    
}

