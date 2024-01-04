<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['id','image','name', 'brand', 'description','stok', 'price'];
    
    public function rating()
    {
        return $this->hasMany(Rating::class, 'id_produk');
    }
    public function transaksi()
    {
        return $this->hasMany(Transaction::class, 'id_produk');
    }
}

