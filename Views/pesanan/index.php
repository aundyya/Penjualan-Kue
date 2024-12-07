<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1>Daftar Pesanan</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <a href="<?= site_url('pesanan/create') ?>" class="btn btn-primary mb-3">Tambah Pesanan</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Pesanan</th>
                <th>Total Harga</th>
                <th>Status Pesanan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($pesanan)): ?>
                <?php foreach ($pesanan as $i => $p): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= $p['nama_pelanggan'] ?></td>
                        <td><?= date('d-m-Y', strtotime($p['tanggal_pesanan'])) ?></td>
                        <td><?= number_format($p['total_harga'], 2, ',', '.') ?></td>
                        <td><?= ucfirst($p['status_pesanan']) ?></td>
                        <td>
                            <a href="<?= site_url('pesanan/edit/' . $p['id_pesanan']) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= site_url('pesanan/bayar/' . $p['id_pesanan']) ?>" class="btn btn-success btn-sm">Bayar</a>
                            <a href="<?= site_url('pesanan/detail/') . $p['id_pesanan']; ?>" class="btn btn-primary btn-sm">Detail</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data pesanan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>

<?= $this->endSection() ?>