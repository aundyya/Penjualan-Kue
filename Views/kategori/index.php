<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1>Daftar Kategori</h1>
    <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahKategoriModal">Tambah Kategori</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kategori as $i => $k): ?>
                <tr>
                    <td><?= esc($i + 1) ?></td>
                    <td><?= esc($k['nama_kategori']) ?></td>
                    <td>
                        <a href="<?= site_url('kategori/edit/' . $k['id_kategori']) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= site_url('kategori/delete/' . $k['id_kategori']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Modal untuk Tambah Kategori -->
    <div class="modal fade" id="tambahKategoriModal" tabindex="-1" role="dialog" aria-labelledby="tambahKategoriLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?= site_url('kategori/store') ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahKategoriLabel">Tambah Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori:</label>
                            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>