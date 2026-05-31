<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SIAKAD UNIPI - <?= $title ?? 'Dashboard' ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-logo">
            <img src="<?= base_url('/assets/image/logo3.png') ?>" alt="Logo" class="logo-img">
        </div>
        <nav>
            <a href="<?= base_url('/') ?>" class="nav-item">Dashboard (Bab 1)</a>
            <a href="<?= base_url('dashboard/schema/mahasiswa') ?>" class="nav-item">Schema DB (Bab 2)</a>
            <a href="<?= base_url('mahasiswa') ?>" class="nav-item">Mahasiswa (Bab 3)</a>
            <a href="<?= base_url('dosen') ?>" class="nav-item">Dosen (Bab 3)</a>
            <a href="<?= base_url('matakuliah') ?>" class="nav-item">Mata Kuliah (Bab 3)</a>
            <a href="<?= base_url('nilai') ?>" class="nav-item">Nilai (Bab 3)</a>
            <a href="<?= base_url('transkrip') ?>" class="nav-item">Transkrip (Bab 4)</a>
            <a href="<?= base_url('laporan') ?>" class="nav-item">Laporan (Bab 5-6)</a>
            <a href="<?= base_url('nilai/log') ?>" class="btn" style="background: #6B7280; color: white;">View Audit Log</a>
        </nav>
    </div>

    <div class="main-content">
        <h2 class="page-title"><?= $title ?? 'Dashboard' ?></h2>
        <p class="page-sub">SIAKAD UNIPI - Teknik Informatika</p>
        
        <?= $this->renderSection('content') ?>
    </div>
</body>
</html>