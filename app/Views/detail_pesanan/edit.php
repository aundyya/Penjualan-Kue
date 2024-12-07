<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h1>Edit Detail Pesanan</h1>
<form action="<?= site_url('detail_pesanan/update/' . $detail_pesanan['id_detail_pesanan']) ?>" method="post">
    <div class="form-group">
        <label>ID Pesanan:</label>
        <input type="number" name="id_pesanan" class="form-control" value="<?= $detail_pesanan['id_pesanan'] ?>" required>
    </div>
    <div class="form-group">
        <label>ID Produk:</label>
        <input type="number" name="id_produk" class="form-control" value="<?= $detail_pesanan['id_produk'] ?>" required>
    </div>
    <div class="form-group">
        <label>Kuantitas:</label>
        <input type="number" name="kuantitas" class="form-control" value="<?= $detail_pesanan['kuantitas'] ?>" required>
    </div>
    <div class="form-group">
        <label>Harga Satuan:</label>
        <input type="number" name="harga_satuan" class="form-control" value="<?= $detail_pesanan['harga_satuan'] ?>" step="0.01" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= site_url('detail_pesanan') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>