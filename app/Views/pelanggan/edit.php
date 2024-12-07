<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <center>
        <h1>Edit Pelanggan</h1>
    </center>
    <form action="<?= site_url('pelanggan/update/' . $pelanggan['id_pelanggan']) ?>" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama_pelanggan" class="form-control" value="<?= esc($pelanggan['nama_pelanggan']) ?>" required>
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" class="form-control" required><?= esc($pelanggan['alamat']) ?></textarea>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="<?= esc($pelanggan['email']) ?>">
        </div>
        <div class="form-group">
            <label>Telepon:</label>
            <input type="text" name="telepon" class="form-control" value="<?= esc($pelanggan['telepon']) ?>">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= site_url('pelanggan') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection() ?>