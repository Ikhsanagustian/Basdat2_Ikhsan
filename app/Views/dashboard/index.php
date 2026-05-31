<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <div class="stat-grid">
        <div class="stat-card">
            <div class="stat-label">Total Mahasiswa</div>
            <div class="stat-value"><?= $total_mhs ?></div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Total Dosen</div>
            <div class="stat-value"><?= $total_dosen ?></div>
        </div>
         <div class="stat-card">
            <div class="stat-label">Total Matakuliah</div>
            <div class="stat-value"><?= $total_mk ?></div>
        </div>
    </div>

    <!-- Tambahkan Card Baru untuk Diagram -->
    <div class="card" style="margin-bottom: 20px;">
        <h3>Grafik Rata-rata IPK Mahasiswa</h3>
        <div style="position: relative; height:40vh; width:100%">
            <!-- Elemen Canvas Tempat Diagram Digambar -->
            <canvas id="chartIpk"></canvas>
        </div>
    </div>

    <div class="card">
        <h3>Rekap Nilai (vw_rekap_ipk)</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Mahasiswa</th>
                    <th>Rata-rata</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rekap_ipk as $r): ?>
                <tr>
                    <td><?= $r['nama_mahasiswa'] ?></td>
                    <td><?= $r['rata_rata'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- SCRIPT UNTUK MERENDER DIAGRAM -->
<!-- Load Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Ambil data dari PHP
    const namaMahasiswa = [
        <?php foreach ($rekap_ipk as $r) { ?>
            "<?= $r['nama_mahasiswa']; ?>",
        <?php } ?>
    ];

    const rataRataIpk = [
        <?php foreach ($rekap_ipk as $r) { ?>
            <?= $r['rata_rata']; ?>,
        <?php } ?>
    ];

    // Warna untuk setiap bagian donat
    const warnaDiagram = [
        '#4e73df',
        '#1cc88a',
        '#36b9cc',
        '#f6c23e',
        '#e74a3b',
        '#6f42c1',
        '#fd7e14',
        '#20c997',
        '#0dcaf0',
        '#198754',
        '#dc3545',
        '#ffc107',
        '#6610f2',
        '#6c757d',
        '#17a2b8'
    ];

    // Render Doughnut Chart
    const ctx = document.getElementById('chartIpk').getContext('2d');

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: namaMahasiswa,
            datasets: [{
                label: 'Rata-rata IPK',
                data: rataRataIpk,
                backgroundColor: warnaDiagram,
                borderColor: '#ffffff',
                borderWidth: 2,
                hoverOffset: 10
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: {
                    display: true,
                    position: 'right'
                },

                title: {
                    display: true,
                    text: 'Distribusi Rata-rata IPK Mahasiswa'
                },

                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.label + ' : ' + context.parsed.toFixed(2);
                        }
                    }
                }
            },

            cutout: '60%'
        }
    });
</script>

<?= $this->endSection() ?>