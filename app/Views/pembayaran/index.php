<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h1>Daftar Pembayaran</h1>
<a href="<?= site_url('pembayaran/create') ?>" class="btn btn-primary mb-3">Tambah Pembayaran</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>ID Pesanan</th>
            <th>Tanggal Pembayaran</th>
            <th>Jumlah Pembayaran</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pembayaran as $p): ?>
            <tr>
                <td><?= $p['id_pembayaran'] ?></td>
                <td><?= $p['id_pesanan'] ?></td>
                <td><?= $p['tanggal_pembayaran'] ?></td>
                <td><?= number_format($p['jumlah_pembayaran'], 2, ',', '.') ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>