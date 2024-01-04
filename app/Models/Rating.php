<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
   protected $table = 'tabel_rating';
    protected $fillable = ['id_rating','rating', 'komentar'];
    
    public function product()
    {
        return $this->belongsTo(Product::class,'id_produk');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }

}

