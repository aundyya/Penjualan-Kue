<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<h1>Edit Produk</h1>

<form action="<?= site_url('produk/update/' . $produk['id_produk']) ?>" method="post">
    <div class="form-group">
        <label for="nama_produk">Nama Produk:</label>
        <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="<?= esc($produk['nama_produk']) ?>" required>
    </div>
    <div class="form-group">
        <label for="kategori_produk">Kategori:</label>
        <select name="kategori_produk" id="kategori_produk" class="form-control" required>
            <option value="">Pilih Kategori</option>
            <?php foreach ($kategori as $k): ?>
                <option value="<?= esc($k['id_kategori']) ?>" <?= ($k['id_kategori'] == $produk['kategori_produk']) ? 'selected' : '' ?>><?= esc($k['nama_kategori']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="harga">Harga:</label>
        <input type="number" name="harga" id="harga" class="form-control" step="0.01" value="<?= esc($produk['harga']) ?>" required>
    </div>
    <div class="form-group">
        <label for="stok">Stok:</label>
        <input type="number" name="stok" id="stok" class="form-control" value="<?= esc($produk['stok']) ?>" required>
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi:</label>
        <textarea name="deskripsi" id="deskripsi" class="form-control" required><?= esc($produk['deskripsi']) ?></textarea>
    </div>
    <button type="submit" class="btn btn-success">Perbarui</button>
    <a href="<?= site_url('produk') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>