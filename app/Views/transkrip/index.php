<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="card">
    <h2 class="page-title">Daftar Transkrip Mahasiswa</h2>
    <p class="page-sub">Klik detail untuk melihat rincian nilai per mata kuliah</p>

    <table class="table">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Prodi</th>
                <th style="text-align: center;">Total MK</th>
                <th style="text-align: center;">Rata-rata</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transkrip as $t): ?>
            <tr>
                <td><code><?= $t['nim'] ?></code></td>
                <td><?= $t['nama_mahasiswa'] ?></td>
                <td><?= $t['program_studi'] ?></td>
                <td style="text-align: center;"><?= $t['total_matkul'] ?></td>
                <td style="text-align: center; font-weight: bold;"><?= number_format($t['rata_rata'], 2) ?></td>
                <td>
                    <a href="<?= base_url('transkrip/'.$t['nim']) ?>" class="btn btn-primary btn-sm">Lihat Detail</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>