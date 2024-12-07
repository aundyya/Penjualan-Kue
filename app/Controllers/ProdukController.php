<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\KategoriModel; // Model untuk kategori

class ProdukController extends BaseController
{
    protected $produkModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->kategoriModel = new KategoriModel(); // Inisialisasi model kategori
    }

    public function index()
    {
        $data['produk'] = $this->produkModel->findAll();
        return view('produk/index', $data);
    }

    public function create()
    {
        $data['kategori'] = $this->kategoriModel->findAll(); // Ambil data kategori

        return view('produk/create', $data); // Pindah ke tampilan create
    }


    public function store()
    {
        // Validasi input
        if (!$this->validate([
            'nama_produk' => 'required|min_length[3]',
            'kategori_produk' => 'required',
            'harga' => 'required|decimal',
            'stok' => 'required|integer',
            'deskripsi' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data produk
        $this->produkModel->save([
            'nama_produk' => $this->request->getPost('nama_produk'),
            'kategori_produk' => $this->request->getPost('kategori_produk'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ]);

        // Redirect ke halaman produk dengan pesan sukses
        return redirect()->to('/produk')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['produk'] = $this->produkModel->find($id); // Use the class instance
        $data['kategori'] = $this->kategoriModel->findAll(); // Use the class instance
        return view('produk/edit', $data);
    }

    public function update($id)
    {
        // Validasi input
        if (!$this->validate([
            'nama_produk' => 'required|min_length[3]',
            'kategori_produk' => 'required',
            'harga' => 'required|decimal',
            'stok' => 'required|integer',
            'deskripsi' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Update data produk
        $this->produkModel->update($id, [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'kategori_produk' => $this->request->getPost('kategori_produk'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ]);

        // Redirect ke halaman produk dengan pesan sukses
        return redirect()->to('/produk')->with('success', 'Produk berhasil diperbarui');
    }

    public function delete($id)
    {
        // Periksa apakah produk ada sebelum dihapus
        $produk = $this->produkModel->find($id);
        if (!$produk) {
            return redirect()->to('/produk')->with('error', 'Produk tidak ditemukan.');
        }

        $this->produkModel->delete($id);
        return redirect()->to('/produk')->with('success', 'Produk berhasil dihapus');
    }
}
