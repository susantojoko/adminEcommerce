<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'users'; // Menyebutkan nama tabel yang sesuai

    // Mass Assignment
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    // Fungsi untuk mengambil semua data admin
    public function getAllAdmins()
    {
        return $this->all();
    }

    // Fungsi untuk menambahkan data admin baru
    public function createAdmin($data)
    {
        return $this->create($data);
    }

    // Fungsi untuk mengambil admin berdasarkan ID
    public function getAdminById($id)
    {
        return $this->find($id);
    }

    // Fungsi untuk memperbarui data admin
    public function updateAdmin($id, $data)
    {
        return $this->where('id_admin', $id)->update($data);
    }

    // Fungsi untuk menghapus admin berdasarkan ID
    public function deleteAdmin($id)
    {
        return $this->where('id_admin', $id)->delete();
    }
}
