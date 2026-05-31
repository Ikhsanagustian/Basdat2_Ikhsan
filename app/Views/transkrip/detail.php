<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <div>
            <h2 class="page-title">Detail Nilai Mahasiswa</h2>
            <p class="page-sub">Data diambil menggunakan Stored Procedure (Bab 8)</p>
        </div>
        <a href="<?= base_url('transkrip') ?>" class="btn">← Kembali</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Mata Kuliah</th>
                <th style="text-align: center;">SKS</th>
                <th style="text-align: center;">Nilai Akhir</th>
                <th style="text-align: center;">Grade</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($detail)): ?>
                <tr>
                    <td colspan="4" style="text-align: center;">Mahasiswa ini belum memiliki nilai.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($detail as $d): ?>
                    <tr>
                        <td><strong><?= $d['nama_mk'] ?></strong></td>
                        <td style="text-align: center;"><?= $d['sks'] ?></td>
                        <td style="text-align: center;"><?= $d['nilai_akhir'] ?></td>
                        <td style="text-align: center;">
                            <span class="badge"><?= $d['grade'] ?></span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>