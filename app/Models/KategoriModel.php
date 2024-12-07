<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori'; // Nama tabel kategori
    protected $primaryKey = 'id_kategori'; // Nama kolom primary key
    protected $allowedFields = ['nama_kategori']; // Kolom yang diizinkan untuk diisi
}
