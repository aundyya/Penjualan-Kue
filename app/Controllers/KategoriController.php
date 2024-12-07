<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class KategoriController extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }

    // Method untuk menampilkan daftar kategori
    public function index()
    {
        $data['kategori'] = $this->kategoriModel->findAll();
        return view('kategori/index', $data);
    }

    // Method untuk menyimpan kategori
    public function store()
    {
        // Validasi input
        if (!$this->validate([
            'nama_kategori' => 'required|min_length[3]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data
        $this->kategoriModel->save([
            'nama_kategori' => $this->request->getPost('nama_kategori'),
        ]);

        // Redirect ke halaman kategori dengan pesan sukses
        return redirect()->to('/kategori')->with('success', 'Kategori berhasil ditambahkan');
    }


    // Method untuk menampilkan form edit kategori
    public function edit($id)
    {
        $data['kategori'] = $this->kategoriModel->find($id);
        return view('kategori/edit', $data);
    }

    // Method untuk memperbarui kategori
    public function update($id)
    {
        // Validasi input
        if (!$this->validate([
            'nama_kategori' => 'required|min_length[3]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Update data
        $this->kategoriModel->update($id, [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
        ]);

        // Redirect ke halaman kategori dengan pesan sukses
        return redirect()->to('/kategori')->with('success', 'Kategori berhasil diperbarui');
    }

    // Method untuk menghapus kategori
    public function delete($id)
    {
        $this->kategoriModel->delete($id);
        return redirect()->to('/kategori')->with('success', 'Kategori berhasil dihapus');
    }
}
