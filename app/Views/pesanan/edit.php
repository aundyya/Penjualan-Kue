<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1>Edit Pesanan</h1>

    <form action="<?= site_url('pesanan/update/' . $pesanan['id_pesanan']) ?>" method="post">
        <div class="form-group">
            <label>ID Pelanggan:</label>
            <input type="number" name="id_pelanggan" class="form-control" value="<?= $pesanan['id_pelanggan'] ?>" required>
        </div>
        <div class="form-group">
            <label>Tanggal Pesanan:</label>
            <input type="datetime-local" name="tanggal_pesanan" class="form-control" value="<?= date('Y-m-d\TH:i', strtotime($pesanan['tanggal_pesanan'])) ?>" required>
        </div>
        <div class="form-group">
            <label>Total Harga:</label>
            <input type="number" name="total_harga" class="form-control" value="<?= $pesanan['total_harga'] ?>" step="0.01" required>
        </div>
        <div class="form-group">
            <label>Status Pesanan:</label>
            <select name="status_pesanan" class="form-control" required>
                <option value="pending" <?= $pesanan['status_pesanan'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                <option value="selesai" <?= $pesanan['status_pesanan'] == 'selesai' ? 'selected' : '' ?>>Selesai</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= site_url('pesanan') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection() ?>