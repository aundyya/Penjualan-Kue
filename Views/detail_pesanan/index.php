<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1>Daftar Detail Pesanan</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Pesanan</th>
                <th>ID Produk</th>
                <th>Kuantitas</th>
                <th>Harga Satuan</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($detail_pesanan)): ?>
                <?php foreach ($detail_pesanan as $d): ?>
                    <tr>
                        <td><?= $d['id_detail_pesanan'] ?></td>
                        <td><?= $d['id_pesanan'] ?></td>
                        <td><?= $d['id_produk'] ?></td>
                        <td><?= $d['kuantitas'] ?></td>
                        <td><?= number_format($d['harga_satuan'], 2, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data detail pesanan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>