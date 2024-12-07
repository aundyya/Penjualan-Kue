<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<h1>Tambah Kategori</h1>
<form action="<?= site_url('kategori/store') ?>" method="post">
    <div class="form-group">
        <label>Nama Kategori:</label>
        <input type="text" name="nama_kategori" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= site_url('kategori') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>