<?php

namespace App\Controllers;

use App\Models\TugasBesarModel;

class Dashboard extends BaseController
{
    public function index()
    {
        // Hubungkan ke Model yang sudah kamu buat [cite: 58, 62]
        $model = new TugasBesarModel();
        $db    = \Config\Database::connect();

        // 1. Ambil data statistik (Bab 5 — Aggregate) 
        $data['total_mhs']   = $db->table('mahasiswa')->countAllResults();
        $data['total_dosen'] = $db->table('dosen')->countAllResults();
        $data['total_mk']    = $db->table('mata_kuliah')->countAllResults();
        
        // Query untuk rata-rata nilai
        $avgQuery = $db->query("SELECT AVG(nilai_akhir) as rata FROM nilai")->getRow();
        $data['avg_nilai'] = $avgQuery ? $avgQuery->rata : 0;

        // 2. Ambil data dari VIEW (Bab 7 — vw_rekap_ipk) 
        $data['rekap_ipk'] = $model->getRekapIPK();

        // 3. Kirim semua kantong data ke View [cite: 62, 108]
        return view('dashboard/index', $data);
    }

    public function schema($tabel = 'mahasiswa')
    {
        $db = \Config\Database::connect();
        // Menjalankan perintah DESCRIBE (Bab 2)
        $data['fields'] = $db->query("DESCRIBE $tabel")->getResultArray();
        $data['tabel_aktif'] = $tabel;
        $data['semua_tabel'] = ['mahasiswa', 'dosen', 'mata_kuliah', 'nilai'];

        return view('dashboard/schema', $data);
    }
}