<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <center>
        <h1>Tambah Pelanggan</h1>
    </center>

    <!-- Tampilkan pesan error validasi jika ada -->
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Tampilkan pesan sukses jika ada -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('pelanggan/store') ?>" method="post">
        <?= csrf_field() ?> <!-- CSRF Protection -->

        <div class="form-group">
            <label for="nama_pelanggan">Nama:</label>
            <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" value="<?= old('nama_pelanggan') ?>" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea name="alamat" id="alamat" class="form-control" required><?= old('alamat') ?></textarea>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= old('email') ?>" required>
        </div>

        <div class="form-group">
            <label for="telepon">Telepon:</label>
            <input type="tel" name="telepon" id="telepon" class="form-control" value="<?= old('telepon') ?>" pattern="[0-9]{10,15}" title="Masukkan nomor telepon yang valid (10-15 digit)">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= site_url('pelanggan') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection() ?>