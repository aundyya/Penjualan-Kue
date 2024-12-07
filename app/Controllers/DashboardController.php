<?php

namespace App\Controllers;

use App\Models\PelangganModel;
use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\PesananModel;
use App\Models\DetailPesananModel;
use App\Models\PembayaranModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $pelangganModel = new PelangganModel();
        $produkModel = new ProdukModel();
        $kategoriModel = new KategoriModel();
        $pesananModel = new PesananModel();
        $detailPesananModel = new DetailPesananModel();
        $pembayaranModel = new PembayaranModel();

        $data = [
            'jumlah_pelanggan' => $pelangganModel->countAll(),
            'jumlah_produk' => $produkModel->countAll(),
            'jumlah_kategori' => $kategoriModel->countAll(),
            'jumlah_pesanan' => $pesananModel->countAll(),
            'jumlah_detail_pesanan' => $detailPesananModel->countAll(),
            'jumlah_pembayaran' => $pembayaranModel->countAll(),
        ];

        return view('dashboard/index', $data);
    }
}
