<link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">

<div style="display: flex; width: 100%;">
    <div class="sidebar"> </div>

    <div class="main-content" style="flex: 1;">
        <div class="card" style="max-width: 600px;">
            <h2 class="page-title">Tambah Data Dosen</h2>
            <p class="page-sub">Implementasi DML: INSERT</p>

            <form action="<?= base_url('dosen/simpan') ?>" method="post">
                <div style="margin-bottom: 1rem;">
                    <label style="display:block; margin-bottom:5px;">NIDN</label>
                    <input type="text" name="nidn" class="stat-card" style="width:100%; padding:10px;" required>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label style="display:block; margin-bottom:5px;">Nama Lengkap</label>
                    <input type="text" name="nama_dosen" class="stat-card" style="width:100%; padding:10px;" required>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label style="display:block; margin-bottom:5px;">Program Studi</label>
                    <input type="text" name="program_studi" class="stat-card" style="width:100%; padding:10px;" required>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <label style="display:block; margin-bottom:5px;">Jabatan</label>
                    <input type="text" name="jabatan" class="stat-card" style="width:100%; padding:10px;" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Simpan Data</button>
                <a href="<?= base_url('dosen') ?>" class="btn">Batal</a>
            </form>
        </div>
    </div>
</div>