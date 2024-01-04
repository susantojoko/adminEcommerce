<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'tabel_transaksi'; // Sesuaikan dengan nama tabel yang digunakan

    protected $primaryKey = 'id_transaksi'; // Sesuaikan dengan nama kolom kunci utama

    protected $fillable = [
        'nomer_transaksi',
        'id_user',
        'id_produk',
        'jumlah_produk',
        'harga_produk',
        'total_produk',
        'tanggal_transaksi',
        'status_transaksi',
    ];

    // Relasi dengan tabel 'users' (misalnya)
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relasi dengan tabel 'products' (misalnya)
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_produk');
    }
}
