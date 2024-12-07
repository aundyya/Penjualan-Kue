<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <center>
        <h1>Daftar Pelanggan</h1>
    </center>

    <!-- Tampilkan pesan flashdata jika ada -->
    <?php if (session()->getFlashdata('message')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php endif; ?>

    <!-- Tombol tambah pelanggan -->
    <div class="d-flex justify-content-end mb-3">
        <a href="/pelanggan/create" class="btn btn-primary">Tambah Pelanggan</a>
    </div>

    <!-- Tabel daftar pelanggan -->
    <table class="table table-striped table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($pelanggan)): ?>
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data pelanggan</td>
                </tr>
            <?php else: ?>
                <?php foreach ($pelanggan as $i => $p): ?>
                    <tr>
                        <td><?= $i + 1 ?></td> <!-- Dinamis untuk pagination -->
                        <td><?= esc($p['nama_pelanggan']) ?></td>
                        <td>
                            <!-- Tombol edit -->
                            <a href="<?= site_url('pelanggan/edit/' . $p['id_pelanggan']) ?>" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Tombol hapus dengan form POST -->
                            <form action="<?= site_url('pelanggan/delete/' . $p['id_pelanggan']) ?>" method="post" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>