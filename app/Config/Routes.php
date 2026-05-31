<?php

use CodeIgniter\Router\RouteCollection;
use Config\Services;

/**
 * @var RouteCollection $routes
 */
$routes = Services::routes();
$routes->get('/', 'Dashboard::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('dashboard/schema/(:any)', 'Dashboard::schema/$1');

// Mahasiswa CRUD (Bab 3)
$routes->get('/mahasiswa', 'Mahasiswa::index');
$routes->get('/mahasiswa/tambah', 'Mahasiswa::tambah');
$routes->post('/mahasiswa/simpan', 'Mahasiswa::simpan');
$routes->get('/mahasiswa/edit/(:segment)', 'Mahasiswa::edit/$1');
$routes->post('/mahasiswa/update/(:segment)', 'Mahasiswa::update/$1');
$routes->get('/mahasiswa/hapus/(:segment)', 'Mahasiswa::hapus/$1');

// Dosen CRUD (Bab 3)
$routes->get('/dosen', 'Dosen::index');
$routes->get('/dosen/tambah', 'Dosen::tambah');
$routes->post('/dosen/simpan', 'Dosen::simpan');
$routes->get('/dosen/edit/(:segment)', 'Dosen::edit/$1');
$routes->post('/dosen/update/(:segment)', 'Dosen::update/$1');
$routes->get('/dosen/hapus/(:segment)', 'Dosen::hapus/$1');

// Mata Kuliah CRUD (Bab 3)
$routes->get('/matakuliah', 'MataKuliah::index');
$routes->get('/matakuliah/tambah', 'MataKuliah::tambah');
$routes->post('/matakuliah/simpan', 'MataKuliah::simpan');
$routes->get('/matakuliah/edit/(:segment)', 'MataKuliah::edit/$1');
$routes->post('/matakuliah/update/(:segment)', 'MataKuliah::update/$1');
$routes->get('/matakuliah/hapus/(:segment)', 'MataKuliah::hapus/$1');

// Nilai (Bab 3+9 Transaction)
$routes->get('/nilai', 'Nilai::index');
$routes->get('/nilai/tambah', 'Nilai::tambah');
$routes->post('/nilai/simpan', 'Nilai::simpan');
$routes->post('/nilai/update', 'Nilai::update');
$routes->get('/nilai/hapus/(:num)', 'Nilai::hapus/$1');
$routes->get('nilai/log', 'Nilai::log');

// Transkrip — JOIN + VIEW + SP (Bab 4+7+8)
$routes->get('/transkrip', 'Transkrip::index');
$routes->get('/transkrip/(:segment)', 'Transkrip::detail/$1');

// Laporan — Aggregate + Subquery (Bab 5+6)
$routes->get('/laporan', 'Laporan::index');

// Auth
$routes->get('login', 'Auth::login');
$routes->post('auth/proses_login', 'Auth::proses_login');
$routes->get('logout', 'Auth::logout');

// Proteksi semua halaman kecuali login
$routes->group('', ['filter' => 'auth'], function($routes) {

});