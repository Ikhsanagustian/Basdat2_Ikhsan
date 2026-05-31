<link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">

<div style="display: flex; width: 100%;">
    <div class="sidebar"> </div>

    <div class="main-content" style="flex: 1;">
        <div class="card" style="max-width: 600px;">
            <h2 class="page-title">Tambah Data Mata Kuliah</h2>
            <p class="page-sub">Implementasi DML: INSERT</p>

            <form action="<?= base_url('matakuliah/simpan') ?>" method="post">
                <div style="margin-bottom: 1rem;">
                    <label style="display:block; margin-bottom:5px;">Kode Mata Kuliah</label>
                    <input type="text" name="kode_mk" class="stat-card" style="width:100%; padding:10px;" required>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label style="display:block; margin-bottom:5px;">Nama Mata Kuliah</label>
                    <input type="text" name="nama_mk" class="stat-card" style="width:100%; padding:10px;" required>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label style="display:block; margin-bottom:5px;">SKS</label>
                    <input type="number" name="sks" class="stat-card" style="width:100%; padding:10px;" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Simpan Data</button>
                <a href="<?= base_url('matakuliah') ?>" class="btn">Batal</a>
            </form>
        </div>
    </div>
</div>