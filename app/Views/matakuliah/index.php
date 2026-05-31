<link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">

<div style="display: flex; width: 100%;">
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

    <div class="main-content" style="flex: 1;">
        <div class="card">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                <div>
                    <h2 class="page-title">Manajemen Mata Kuliah</h2>
                    <p class="page-sub">Implementasi DML: SELECT & DELETE</p>
                </div>
                <a href="<?= base_url('matakuliah/tambah') ?>" class="btn btn-primary">+ Tambah Mata Kuliah</a>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>SKS</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($matkul as $mk): ?>
                    <tr>
                        <td><strong><?= $mk['kode_mk'] ?></strong></td>
                        <td><?= $mk['nama_mk'] ?></td>
                        <td><?= $mk['sks'] ?></td>
                        <td>
                            <a href="<?= base_url('matakuliah/hapus/'.$mk['kode_mk']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>