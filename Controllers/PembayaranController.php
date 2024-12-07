<?php

namespace App\Controllers;

use App\Models\PembayaranModel;

class PembayaranController extends BaseController
{
    protected $pembayaranModel;

    public function __construct()
    {
        $this->pembayaranModel = new PembayaranModel();
    }

    public function store()
    {
        $this->pembayaranModel->save([
            'id_pesanan' => $this->request->getPost('id_pesanan'),
            'tanggal_pembayaran' => $this->request->getPost('tanggal_pembayaran'),
            'jumlah' => $this->request->getPost('jumlah'),
        ]);
        return redirect()->to('/pembayaran');
    }
}
