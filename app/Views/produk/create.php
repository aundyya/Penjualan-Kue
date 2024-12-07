<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1>Tambah Produk</h1>

    <!-- Tampilkan pesan error jika ada -->
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Tampilkan pesan sukses jika ada -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('produk/store') ?>" method="post">
        <?= csrf_field() ?> <!-- CSRF Protection -->
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td>
                        <label for="nama_produk">Nama Produk:</label>
                        <input type="text" name="nama_produk" id="nama_produk" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="kategori_produk">Kategori:</label>
                        <select name="kategori_produk" id="kategori_produk" class="form-control" required>
                            <option value="">Pilih Kategori</option>
                            <?php if (!empty($kategori)): ?>
                                <?php foreach ($kategori as $k): ?>
                                    <option value="<?= esc($k['id_kategori']) ?>"><?= esc($k['nama_kategori']) ?></option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="">Tidak ada kategori tersedia</option>
                            <?php endif; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="harga">Harga:</label>
                        <input type="number" name="harga" id="harga" class="form-control" step="0.01" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="stok">Stok:</label>
                        <input type="number" name="stok" id="stok" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="deskripsi">Deskripsi:</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= site_url('produk') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection() ?>