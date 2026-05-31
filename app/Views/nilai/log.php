<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <div>
            <h2 class="page-title">Audit Log Perubahan Nilai</h2>
            <p class="page-sub">Data dicatat otomatis oleh <strong>Trigger</strong> (Bab 9)</p>
        </div>
        <a href="<?= base_url('nilai') ?>" class="btn">← Kembali ke Nilai</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Waktu</th>
                <th>NIM</th>
                <th>Aksi</th>
                <th style="text-align: center;">Nilai Baru</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($logs)): ?>
                <tr>
                    <td colspan="4" style="text-align: center;">Belum ada riwayat perubahan.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($logs as $l): ?>
                <tr>
                    <td><small><?= $l['waktu'] ?></small></td>
                    <td><code><?= $l['nim'] ?></code></td>
                    <td>
                        <span class="badge" style="background: #E0E7FF; color: #4338CA;">
                            <?= $l['aksi'] ?>
                        </span>
                    </td>
                    <td style="text-align: center; font-weight: bold;"><?= $l['nilai_baru'] ?></td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>