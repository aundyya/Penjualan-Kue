<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk'; // Ganti dengan nama tabel yang sesuai
    protected $primaryKey = 'id_produk'; // Ganti dengan primary key yang sesuai
    protected $allowedFields = ['nama_produk', 'kategori_produk', 'harga', 'stok', 'deskripsi'];
}
