<link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">

<div style="display: flex; width: 100%;">
    <div class="sidebar"> </div>

    <div class="main-content" style="flex: 1;">
        <div class="card" style="max-width: 600px;">
            <h2 class="page-title">Tambah Data Mahasiswa</h2>
            <p class="page-sub">Implementasi DML: INSERT</p>

            <form action="<?= base_url('mahasiswa/simpan') ?>" method="post">
                <div style="margin-bottom: 1rem;">
                    <label style="display:block; margin-bottom:5px;">NIM</label>
                    <input type="text" name="nim" class="stat-card" style="width:100%; padding:10px;" required>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label style="display:block; margin-bottom:5px;">Nama Lengkap</label>
                    <input type="text" name="nama_mahasiswa" class="stat-card" style="width:100%; padding:10px;" required>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label style="display:block; margin-bottom:5px;">Program Studi</label>
                    <input type="text" name="program_studi" class="stat-card" style="width:100%; padding:10px;" required>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <label style="display:block; margin-bottom:5px;">Angkatan</label>
                    <input type="number" name="angkatan" class="stat-card" style="width:100%; padding:10px;" required>
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <label style="display:block; margin-bottom:5px;">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="stat-card" style="width:100%; padding:10px;" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <label style="display:block; margin-bottom:5px;">Alamat</label>
                    <textarea name="alamat" class="stat-card" style="width:100%; padding:10px;" rows="4" placeholder="Masukkan alamat lengkap" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Data</button>
                <a href="<?= base_url('mahasiswa') ?>" class="btn">Batal</a>
            </form>
        </div>
    </div>
</div>