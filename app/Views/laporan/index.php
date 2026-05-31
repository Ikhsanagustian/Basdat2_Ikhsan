<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="main-content-inner">
    <h2 class="page-title">Laporan Akademik</h2>
    <p class="page-sub">Implementasi Subquery: Filter Dinamis (Bab 6)</p>

    <div class="card">
        <h3>Statistik Mata Kuliah</h3>
        </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 20px;">
        
        <div class="card">
            <h3 style="color: #16A34A;">Mahasiswa Berprestasi</h3>
            <p style="font-size: 0.8rem; margin-bottom: 15px;">(Nilai > Rata-rata Kampus)</p>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($di_atas_rata as $d): ?>
                    <tr>
                        <td><?= $d['nama_mahasiswa'] ?></td>
                        <td><span class="grade-A"><?= $d['nilai_akhir'] ?></span></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="card">
            <h3 style="color: #DC2626;">Perlu Perhatian</h3>
            <p style="font-size: 0.8rem; margin-bottom: 15px;">(Mahasiswa Belum Input Nilai)</p>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Prodi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($belum_nilai as $b): ?>
                    <tr>
                        <td><?= $b['nama_mahasiswa'] ?></td>
                        <td><?= $b['program_studi'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<?= $this->endSection() ?>