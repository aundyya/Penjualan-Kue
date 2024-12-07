<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'id_pesanan';
    protected $allowedFields = ['id_pelanggan', 'tanggal_pesanan', 'total_harga', 'status_pesanan'];

    // Optional: You can add validation rules here if needed
    protected $validationRules = [
        'id_pelanggan'    => 'required',
        'tanggal_pesanan' => 'required|valid_date',
        'total_harga'     => 'required|numeric',
        'status_pesanan'  => 'required',
    ];
}
