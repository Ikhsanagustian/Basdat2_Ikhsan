<?php
namespace App\Controllers;

class Transkrip extends BaseController {
    protected $db;

    public function __construct() {
        $this->db = \Config\Database::connect();
    }

    // Halaman Utama (Masih pakai VIEW Bab 7)
    public function index() {
        $data['transkrip'] = $this->db->table('vw_rekap_ipk')->get()->getResultArray();
        return view('transkrip/index', $data);
    }

    // Halaman Detail (MENGGUNAKAN SP - BAB 8)
    public function detail($nim) {
        $data['title'] = 'Detail Transkrip: ' . $nim;

        // Eksekusi Stored Procedure
        $query = $this->db->query("CALL sp_get_transkrip(?)", [$nim]);
        
        $data['detail'] = $query->getResultArray();
        
        // Penting: Bersihkan koneksi setelah CALL SP agar tidak error "Commands out of sync"
        $query->close(); 

        return view('transkrip/detail', $data);
    }
}