<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h1>Tambah Pembayaran</h1>
<form action="<?= site_url('pembayaran/store') ?>" method="post">
    <div class="form-group">
        <label>ID Pesanan:</label>
        <input type="number" name="id_pesanan" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Tanggal Pembayaran:</label>
        <input type="datetime-local" name="tanggal_pembayaran" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Jumlah Pembayaran:</label>
        <input type="number" name="jumlah_pembayaran" class="form-control" step="0.01" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= site_url('pembayaran') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>