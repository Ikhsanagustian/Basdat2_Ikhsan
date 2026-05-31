<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="card" style="max-width: 600px;">
    <h2 class="page-title">Input Nilai Baru</h2>
    <p class="page-sub">Bab 9 - Database Transaction</p>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-error"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('nilai/simpan') ?>" method="post">
        <div style="margin-bottom: 1rem;">
            <label style="display:block; margin-bottom:5px;">Pilih Mahasiswa</label>
            <select name="nim" class="stat-card" style="width:100%; padding:10px;" required>
                <option value="">-- Pilih Mahasiswa --</option>
                <?php foreach ($mahasiswa as $m) : ?>
                    <option value="<?= $m['nim'] ?>"><?= $m['nim'] ?> - <?= $m['nama_mahasiswa'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div style="margin-bottom: 1rem;">
            <label style="display:block; margin-bottom:5px;">Pilih Kelas / Mata Kuliah</label>
            <select name="id_kelas" class="stat-card" style="width:100%; padding:10px;" required>
                <option value="">-- Pilih Kelas --</option>
                <?php foreach ($kelas as $k) : ?>
                    <option value="<?= $k['id_kelas'] ?>">Kelas ID: <?= $k['id_kelas'] ?> (MK: <?= $k['kode_mk'] ?>)</option>
                <?php endforeach; ?>
            </select>
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label style="display:block; margin-bottom:5px;">Nilai Akhir (0-100)</label>
            <input type="number" name="nilai_akhir" step="0.01" class="stat-card" style="width:100%; padding:10px;" placeholder="Contoh: 85.5" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Nilai (Transaction)</button>
        <a href="<?= base_url('nilai') ?>" class="btn">Batal</a>
    </form>
</div>
<?= $this->endSection() ?>