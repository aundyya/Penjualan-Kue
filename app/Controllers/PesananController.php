<?php

namespace App\Controllers;

use App\Models\PesananModel;
use App\Models\PelangganModel;
use App\Models\DetailPesananModel;
use App\Models\ProdukModel;

class PesananController extends BaseController
{
    protected $pesananModel;
    protected $detailPesananModel;
    protected $pelangganModel;

    public function __construct()
    {
        $this->pesananModel = new PesananModel();
        $this->detailPesananModel = new DetailPesananModel();
        $this->pelangganModel = new PelangganModel();
    }

    public function index()
    {
        $pesananModel = new PesananModel();
        $pelangganModel = new PelangganModel();

        // Ambil semua pesanan dengan nama pelanggan
        $pesanan = $pesananModel->select('pesanan.*, pelanggan.nama_pelanggan')
            ->join('pelanggan', 'pelanggan.id_pelanggan = pesanan.id_pelanggan')
            ->findAll();

        $data['pesanan'] = $pesanan;

        return view('pesanan/index', $data);
    }

    public function create()
    {
        $produkModel = new ProdukModel();
        $data['produk'] = $produkModel->findAll(); // Ambil semua produk untuk ditampilkan
        return view('pesanan/create', $data);
    }

    public function store()
    {
        // Ambil data dari form
        $id_pelanggan = $this->request->getPost('id_pelanggan'); // Pastikan ini juga ada di form
        $nama_pelanggan = $this->request->getPost('nama_pelanggan');

        // Model untuk pelanggan
        $pelangganModel = new PelangganModel();

        // Cek apakah pelanggan sudah ada berdasarkan ID
        if (!empty($id_pelanggan)) {
            $pelanggan = $pelangganModel->find($id_pelanggan);
        } else {
            // Jika ID pelanggan tidak ada, tambahkan pelanggan baru
            $pelanggan = $pelangganModel->where('nama_pelanggan', $nama_pelanggan)->first();
            if (!$pelanggan) {
                $pelangganModel->save(['nama_pelanggan' => $nama_pelanggan]);
                $id_pelanggan = $pelangganModel->insertID(); // Ambil ID pelanggan yang baru
            } else {
                $id_pelanggan = $pelanggan['id_pelanggan'];
            }
        }

        // Simpan data pesanan
        $this->pesananModel->save([
            'id_pelanggan' => $id_pelanggan,
            'tanggal_pesanan' => $this->request->getPost('tanggal_pesanan'),
            'total_harga' => 0, // Sementara set 0, akan dihitung nanti
            'status_pesanan' => $this->request->getPost('status_pesanan'),
        ]);

        // Ambil ID pesanan yang baru saja disimpan
        $id_pesanan = $this->pesananModel->insertID();

        // Proses detail pesanan
        $produkData = $this->request->getPost('produk');
        $total_harga = 0;

        foreach ($produkData as $item) {
            if (isset($item['id']) && isset($item['jumlah'])) {
                $jumlah = $item['jumlah'];
                $id_produk = $item['id'];

                // Simpan detail pesanan
                $this->detailPesananModel->save([
                    'id_pesanan' => $id_pesanan,
                    'id_produk' => $id_produk,
                    'jumlah' => $jumlah,
                ]);

                // Hitung total harga
                $produkModel = new ProdukModel();
                $produk = $produkModel->find($id_produk);
                if ($produk) {
                    $total_harga += $produk['harga'] * $jumlah;
                }
            }
        }

        // Update total harga pesanan
        $this->pesananModel->update($id_pesanan, ['total_harga' => $total_harga]);

        return redirect()->to('/pesanan')->with('success', 'Pesanan berhasil disimpan.');
    }



    public function edit($id)
    {
        $data['pesanan'] = $this->pesananModel->find($id);
        return view('pesanan/edit', $data);
    }

    public function update($id)
    {
        $this->pesananModel->update($id, [
            'id_pelanggan'    => $this->request->getPost('id_pelanggan'),
            'tanggal_pesanan' => $this->request->getPost('tanggal_pesanan'),
            'total_harga'     => $this->request->getPost('total_harga'),
            'status_pesanan'  => $this->request->getPost('status_pesanan'),
        ]);
        return redirect()->to('/pesanan')->with('success', 'Pesanan berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->pesananModel->delete($id);
        return redirect()->to('/pesanan')->with('success', 'Pesanan berhasil dihapus.');
    }

    public function detail($id)
    {
        // Ambil data pesanan berdasarkan ID
        $pesanan = $this->pesananModel->find($id);
        if (!$pesanan) {
            return redirect()->to('/pesanan')->with('error', 'Pesanan tidak ditemukan.');
        }

        // Ambil detail pesanan
        $detail_pesanan = $this->detailPesananModel
            ->select('detail_pesanan.jumlah, produk.nama_produk, produk.harga, (detail_pesanan.jumlah * produk.harga) as total_harga')
            ->join('produk', 'produk.id_produk = detail_pesanan.id_produk')
            ->where('detail_pesanan.id_pesanan', $id)
            ->findAll();

        // Ambil nama pelanggan
        $pelangganModel = new PelangganModel();
        $pelanggan = $pelangganModel->find($pesanan['id_pelanggan']);

        // Siapkan data untuk dikirim ke view
        $data = [
            'pesanan' => array_merge($pesanan, ['nama_pelanggan' => $pelanggan['nama_pelanggan']]),
            'detail_pesanan' => $detail_pesanan,
        ];

        return view('pesanan/detail', $data);
    }

    public function bayar($id)
    {
        // Validasi ID pesanan
        if (!$this->pesananModel->find($id)) {
            return redirect()->to('/pesanan')->with('error', 'Pesanan tidak ditemukan.');
        }

        // Ambil nominal bayar dari input
        $data = [
            'status_pesanan' => 'selesai',
            // Anda juga bisa menambahkan field lain jika diperlukan
        ];

        // Update status pesanan
        $this->pesananModel->update($id, $data);

        // Redirect ke halaman pesanan dengan pesan sukses
        return redirect()->to('/pesanan')->with('success', 'Pesanan berhasil dibayar dan status diubah menjadi selesai.');
    }
}
