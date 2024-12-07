<?php

namespace App\Controllers;

use App\Models\DetailPesananModel;

class DetailPesananController extends BaseController
{
    protected $detailPesananModel;

    public function __construct()
    {
        $this->detailPesananModel = new DetailPesananModel();
    }

    public function index()
    {
        // Mengambil semua detail pesanan dari model
        $data['detail_pesanan'] = $this->detailPesananModel->findAll();
        return view('detail_pesanan/index', $data); // Pastikan path view sesuai
    }

    public function store()
    {
        $this->detailPesananModel->save([
            'id_pesanan' => $this->request->getPost('id_pesanan'),
            'id_produk' => $this->request->getPost('id_produk'),
            'kuantitas' => $this->request->getPost('kuantitas'),
            'jumlah' => $this->request->getPost('jumlah'),
            'harga_satuan' => $this->request->getPost('harga_satuan'),
        ]);
        return redirect()->to('/detail-pesanan'); // Redirect ke method index
    }
}
