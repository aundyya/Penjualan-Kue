<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('dashboard', 'DashboardController::index');

$routes->get('/register', 'AuthController::register');            // Menampilkan halaman registrasi
$routes->post('/register', 'AuthController::storeRegister');      // Menyimpan data registrasi

$routes->get('/login', 'AuthController::login');                  // Menampilkan halaman login
$routes->post('/login', 'AuthController::authenticate');          // Proses autentikasi login

$routes->get('/logout', 'AuthController::logout');                // Proses logout


// pelanggan
$routes->get('pelanggan', 'PelangganController::index');         // Rute untuk melihat daftar pelanggan
$routes->get('pelanggan/create', 'PelangganController::create'); // Rute untuk halaman tambah pelanggan
$routes->post('pelanggan/store', 'PelangganController::store');   // Rute untuk menyimpan data pelanggan
$routes->get('pelanggan/edit/(:num)', 'PelangganController::edit/$1'); // Rute untuk halaman edit pelanggan
$routes->post('pelanggan/update/(:num)', 'PelangganController::update/$1'); // Rute untuk update pelanggan
$routes->post('pelanggan/delete/(:num)', 'PelangganController::delete/$1');  // Rute untuk hapus pelanggan

// produk
$routes->get('/produk', 'ProdukController::index');
$routes->get('/produk/create', 'ProdukController::create');
$routes->post('/produk/store', 'ProdukController::store');
$routes->get('/produk/edit/(:num)', 'ProdukController::edit/$1');
$routes->post('/produk/update/(:num)', 'ProdukController::update/$1');
$routes->post('/produk/delete/(:num)', 'ProdukController::delete/$1');


// kategori
$routes->get('/kategori', 'KategoriController::index');
$routes->post('/kategori/store', 'KategoriController::store');
$routes->get('/kategori/edit/(:num)', 'KategoriController::edit/$1');
$routes->post('/kategori/update/(:num)', 'KategoriController::update/$1');
$routes->get('/kategori/delete/(:num)', 'KategoriController::delete/$1');

// pesanan
$routes->get('/pesanan', 'PesananController::index');
$routes->get('/pesanan/create', 'PesananController::create');
$routes->post('/pesanan/store', 'PesananController::store');
$routes->get('/pesanan/edit/(:num)', 'PesananController::edit/$1');
$routes->post('/pesanan/update/(:num)', 'PesananController::update/$1');
$routes->get('/pesanan/delete/(:num)', 'PesananController::delete/$1');
$routes->get('/pesanan/detail/(:num)', 'PesananController::detail/$1');
$routes->get('pesanan/bayar/(:num)', 'PesananController::bayar/$1');




// detail_pesanan
$routes->get('detail_pesanan', 'DetailPesananController::index');
$routes->post('detail_pesanan', 'DetailPesananController::store');
// $routes->get('detail_pesanan/create', 'DetailPesananController:create');
// $routes->get('detail_pesanan/edit/(:num)', 'DetailPesananController:edit/$1');
// $routes->post('detail_pesanan/update/(:num)', 'DetailPesananController:update/$1');
// $routes->get('detail_pesanan/delete/(:num)', 'DetailPesananController:delete/$1');

// pembayaran
$routes->get('pembayaran', 'PembayaranController:index');
$routes->get('pembayaran/create', 'PembayaranController:create');
$routes->post('pembayaran/store', 'PembayaranController:store');
$routes->get('pembayaran/edit/(:num)', 'PembayaranController:edit/$1');
$routes->post('pembayaran/update/(:num)', 'PembayaranController:update/$1');
$routes->get('pembayaran/delete/(:num)', 'PembayaranController:delete/$1');

$routes->get('pengguna', 'PenggunaController:index');
$routes->get('pengguna/create', 'PenggunaController:create');
$routes->post('pengguna/store', 'PenggunaController:store');
$routes->get('pengguna/edit/(:num)', 'PenggunaController:edit/$1');
$routes->post('pengguna/update/(:num)', 'PenggunaController:update/$1');
$routes->get('pengguna/delete/(:num)', 'PenggunaController:delete/$1');
