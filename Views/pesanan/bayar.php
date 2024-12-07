<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1>Bayar Pesanan</h1>

    <form action="<?= site_url('pesanan/bayar/' . $pesanan['id_pesanan']) ?>" method="post">
        <div class="form-group">
            <label>Nominal Bayar:</label>
            <input type="number" name="nominal_bayar" class="form-control" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-success">Bayar</button>
        <a href="<?= site_url('pesanan') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection() ?>