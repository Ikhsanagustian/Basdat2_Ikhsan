<?php
namespace App\Controllers;

class Laporan extends BaseController {
    public function index() {
        $db = \Config\Database::connect();
        
        // 1. Data Statistik (Bab 5 - yang tadi)
        $data['statistik'] = $db->query("
            SELECT mk.nama_mk, COUNT(n.id_nilai) as jumlah_mahasiswa, AVG(n.nilai_akhir) as rata_rata
            FROM nilai n
            JOIN kelas k ON n.id_kelas = k.id_kelas
            JOIN mata_kuliah mk ON k.kode_mk = mk.kode_mk
            GROUP BY mk.nama_mk
        ")->getResultArray();

        // 2. Bab 6: Subquery - Mahasiswa yang nilainya DI ATAS RATA-RATA kelasnya
        $data['di_atas_rata'] = $db->query("
            SELECT m.nama_mahasiswa, mk.nama_mk, n.nilai_akhir
            FROM nilai n
            JOIN mahasiswa m ON n.nim = m.nim
            JOIN kelas k ON n.id_kelas = k.id_kelas
            JOIN mata_kuliah mk ON k.kode_mk = mk.kode_mk
            WHERE n.nilai_akhir > (SELECT AVG(nilai_akhir) FROM nilai)
        ")->getResultArray();

        // 3. Bab 6: Subquery - Mahasiswa yang BELUM punya nilai sama sekali (NOT IN)
        $data['belum_nilai'] = $db->query("
            SELECT nim, nama_mahasiswa, program_studi 
            FROM mahasiswa 
            WHERE nim NOT IN (SELECT DISTINCT nim FROM nilai)
        ")->getResultArray();

        $data['title'] = 'Laporan & Subquery (Bab 6)';
        return view('laporan/index', $data);
    }
}