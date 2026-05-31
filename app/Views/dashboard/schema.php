<link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">

<div style="display: flex; width: 100%; align-items: stretch;">

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

    <div class="main-content" style="flex: 1; padding: 20px;">
    <!-- Card Utama dengan Efek Shadow Lembut -->
    <div class="card" style="width: 100%; background: #ffffff; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05); padding: 24px; border: 1px solid #eef2f5;">
        
        <!-- Header Section dengan Aksen Ikon Teoretis -->
        <div style="border-bottom: 2px solid #f4f6f9; padding-bottom: 16px; margin-bottom: 24px;">
            <h2 class="page-title" style="margin: 0; color: #1e293b; font-size: 1.5rem; font-weight: 700; display: flex; align-items: center; gap: 10px;">
                <span style="background: #e0e7ff; color: #4f46e5; padding: 6px 12px; border-radius: 8px; font-size: 0.9rem;">DDL</span>
                Struktur Tabel (Bab 2)
            </h2>
            <p class="page-sub" style="margin: 4px 0 0 0; color: #64748b; font-size: 0.9rem;">Verifikasi struktur database menggunakan perintah <code style="background: #f1f5f9; padding: 2px 6px; border-radius: 4px; color: #0f172a; font-family: monospace;">DESCRIBE</code></p>
        </div>
        
        <!-- Navigation Tabs (Bergaya Segmented Controls) -->
        <div style="margin-bottom: 24px; display: flex; gap: 8px; background: #f1f5f9; padding: 6px; border-radius: 10px; width: fit-content;">
            <?php 
                // Logika sederhana untuk menentukan tombol aktif berdasarkan URL saat ini
                $current_uri = service('uri')->getSegment(3); 
            ?>
            <a href="<?= base_url('dashboard/schema/mahasiswa') ?>" 
               class="btn-tab <?= $current_uri == 'mahasiswa' ? 'active' : '' ?>" style="text-decoration: none;">
               MAHASISWA
            </a>
            <a href="<?= base_url('dashboard/schema/dosen') ?>" 
               class="btn-tab <?= $current_uri == 'dosen' ? 'active' : '' ?>" style="text-decoration: none;">
               DOSEN
            </a>
            <a href="<?= base_url('dashboard/schema/nilai') ?>" 
               class="btn-tab <?= $current_uri == 'nilai' ? 'active' : '' ?>" style="text-decoration: none;">
               NILAI
            </a>
        </div>

        <!-- Modernized Table Wrapper -->
        <div style="overflow-x: auto; border: 1px solid #e2e8f0; border-radius: 8px;">
            <table class="table" style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.95rem;">
                <thead>
                    <tr style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
                        <th style="padding: 14px 16px; color: #475569; font-weight: 600;">Field</th>
                        <th style="padding: 14px 16px; color: #475569; font-weight: 600;">Type</th>
                        <th style="padding: 14px 16px; color: #475569; font-weight: 600; text-align: center;">Null</th>
                        <th style="padding: 14px 16px; color: #475569; font-weight: 600; text-align: center;">Key</th>
                        <th style="padding: 14px 16px; color: #475569; font-weight: 600;">Default</th>
                    </tr>
                </thead>
                <tbody style="color: #334155;">
                    <?php foreach ($fields as $f): ?>
                    <tr style="border-bottom: 1px solid #f1f5f9; transition: background 0.2s;" onmouseover="this.style.backgroundColor='#f8fafc'" onmouseout="this.style.backgroundColor='transparent'">
                        
                        <!-- Field Name (Bold & Darker) -->
                        <td style="padding: 14px 16px; font-weight: 600; color: #0f172a;">
                            <?= $f['Field'] ?>
                        </td>
                        
                        <!-- Data Type dengan styling badge soft -->
                        <td style="padding: 14px 16px;">
                            <span class="badge-type"><?= $f['Type'] ?></span>
                        </td>
                        
                        <!-- Nullable Indicator -->
                        <td style="padding: 14px 16px; text-align: center;">
                            <?php if (strtoupper($f['Null']) == 'YES'): ?>
                                <span style="color: #10b981; font-weight: 500;">✓</span>
                            <?php else: ?>
                                <span style="color: #ffffff;">✕</span>
                            <?php endif; ?>
                        </td>
                        
                        <!-- Key Badge Dinamis (Primary vs Foreign/Multiple) -->
                        <td style="padding: 14px 16px; text-align: center;">
                            <?php if (strtoupper($f['Key']) == 'PRI'): ?>
                                <span class="badge-key key-pri">🔑 PRI</span>
                            <?php elseif (strtoupper($f['Key']) == 'MUL'): ?>
                                <span class="badge-key key-mul">🔗 MUL</span>
                            <?php elseif (!empty($f['Key'])): ?>
                                <span class="badge-key text-muted"><?= $f['Key'] ?></span>
                            <?php else: ?>
                                <span style="color: #cbd5e1;">-</span>
                            <?php endif; ?>
                        </td>
                        
                        <!-- Default Value -->
                        <td style="padding: 14px 16px; font-family: monospace; color: #64748b;">
                            <?= $f['Default'] !== null ? $f['Default'] : '<span style="color: #cbd5e1;">NULL</span>' ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>