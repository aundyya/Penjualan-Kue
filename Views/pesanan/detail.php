<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1>Detail Pesanan</h1>

    <div class="card mb-4">
        <div class="card-body">
            <h5>Nama Pelanggan: <?= $pesanan['nama_pelanggan'] ?></h5>
            <p>Tanggal Pesanan: <?= date('d-m-Y H:i', strtotime($pesanan['tanggal_pesanan'])) ?></p>
            <p>Status Pesanan: <?= ucfirst($pesanan['status_pesanan']) ?></p>
            <p>Total Harga: Rp<?= number_format($pesanan['total_harga'], 2, ',', '.') ?></p>
        </div>
    </div>

    <h2>Detail Produk</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($detail_pesanan)): ?>
                <?php foreach ($detail_pesanan as $item): ?>
                    <tr>
                        <td><?= $item['nama_produk'] ?></td>
                        <td><?= $item['jumlah'] ?></td>
                        <td>Rp<?= number_format($item['harga'], 2, ',', '.') ?></td>
                        <td>Rp<?= number_format($item['total_harga'], 2, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">Tidak ada detail produk untuk pesanan ini.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="<?= site_url('pesanan') ?>" class="btn btn-secondary">Kembali</a>
</div>

<?= $this->endSection() ?>