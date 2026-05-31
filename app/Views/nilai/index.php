<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <div>
            <h2 class="page-title">Manajemen Nilai</h2>
            <p class="page-sub">Bab 4 (JOIN) & Bab 8 (Function Grade)</p>
        </div>
        <a href="<?= base_url('nilai/tambah') ?>" class="btn btn-primary">+ Input Nilai Baru</a>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-error"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
                <th>Mahasiswa</th>
                <th>Mata Kuliah</th>
                <th style="text-align: center;">Nilai Akhir</th>
                <th style="text-align: center;">Grade (Function)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nilai as $n): ?>
            <tr>
                <td><strong><?= $n['nama_mahasiswa'] ?></strong></td>
                <td><?= $n['nama_mk'] ?></td>
                <td style="text-align: center;"><?= $n['nilai_akhir'] ?></td>
                <td style="text-align: center;">
                    <span class="grade-<?= substr($n['grade'], 0, 1) ?>">
                        <?= $n['grade'] ?>
                    </span>
                </td>
                <td>
                    <a href="<?= base_url('nilai/hapus/'.$n['id_nilai']) ?>" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>