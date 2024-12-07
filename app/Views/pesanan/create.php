<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1 class="mb-4">Tambah Pesanan</h1>

    <form action="<?= site_url('pesanan/store') ?>" method="post">
        <!-- Nama Pelanggan -->
        <div class="form-group">
            <label for="nama_pelanggan">Nama Pelanggan:</label>
            <input type="text" id="nama_pelanggan" name="nama_pelanggan" class="form-control" placeholder="Masukkan nama pelanggan" required>
        </div>

        <!-- Pilihan Produk -->
        <div class="form-group">
            <label>Pilih Produk:</label><br>
            <?php if (!empty($produk)): ?>
                <?php foreach ($produk as $p): ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="produk<?= $p['id_produk'] ?>" name="produk[<?= $p['id_produk'] ?>][id]" value="<?= $p['id_produk'] ?>">
                        <label class="form-check-label" for="produk<?= $p['id_produk'] ?>">
                            <?= $p['nama_produk'] ?> - Rp<?= number_format($p['harga'], 2, ',', '.') ?>
                        </label>
                        <input type="number" name="produk[<?= $p['id_produk'] ?>][jumlah]" min="1" value="1" class="form-control form-control-sm" style="width: 80px; display: inline-block; margin-left: 10px;">
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Tidak ada produk yang tersedia.</p>
            <?php endif; ?>
        </div>

        <!-- Tanggal Pesanan -->
        <div class="form-group">
            <label for="tanggal_pesanan">Tanggal Pesanan:</label>
            <input type="datetime-local" id="tanggal_pesanan" name="tanggal_pesanan" class="form-control" required>
        </div>

        <!-- Status Pesanan -->
        <div class="form-group">
            <label for="status_pesanan">Status Pesanan:</label>
            <select id="status_pesanan" name="status_pesanan" class="form-control" required>
                <option value="pending">Pending</option>
                <option value="selesai">Selesai</option>
            </select>
        </div>



        <!-- Tombol Simpan dan Kembali -->
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="<?= site_url('pesanan') ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>