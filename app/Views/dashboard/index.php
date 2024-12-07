<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<div class="container">
    <h1>Dashboard</h1>
    <div class="row">
        <!-- Jumlah Pelanggan -->
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3 shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Jumlah Pelanggan</span>
                    <i class="fas fa-users fa-2x"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $jumlah_pelanggan ?></h5>
                    <p class="card-text">Total pelanggan terdaftar.</p>
                </div>
            </div>
        </div>

        <!-- Jumlah Produk -->
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3 shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Jumlah Produk</span>
                    <i class="fas fa-boxes fa-2x"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $jumlah_produk ?></h5>
                    <p class="card-text">Total produk yang tersedia.</p>
                </div>
            </div>
        </div>

        <!-- Jumlah Pesanan -->
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3 shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Jumlah Pesanan</span>
                    <i class="fas fa-shopping-cart fa-2x"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $jumlah_pesanan ?></h5>
                    <p class="card-text">Total pesanan yang dibuat.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FontAwesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<?= $this->endSection() ?>