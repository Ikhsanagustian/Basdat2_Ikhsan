<?php
namespace App\Controllers;
use App\Models\TugasBesarModel;

class Nilai extends BaseController {
    protected $model;
    protected $db;

    public function __construct() {
        $this->model = new TugasBesarModel();
        $this->db    = \Config\Database::connect();
    }

    public function index() {
        // Bab 4 — JOIN Mahasiswa, Nilai, Kelas, Mata Kuliah
        $data['nilai'] = $this->db->query(
            "SELECT n.id_nilai, m.nama_mahasiswa,
                    mk.nama_mk, n.nilai_akhir,
                    fn_grade(n.nilai_akhir) AS grade
             FROM nilai n
             JOIN mahasiswa m ON n.nim = m.nim
             JOIN kelas k ON n.id_kelas = k.id_kelas
             JOIN mata_kuliah mk ON k.kode_mk = mk.kode_mk
             ORDER BY m.nama_mahasiswa"
        )->getResultArray();

        return view('nilai/index', $data);
    }

    // BAB 9 — Transaction: simpan nilai
    public function simpan() {
        $nim   = $this->request->getPost('nim');
        $kelas = (int)$this->request->getPost('id_kelas');
        $nilai = (float)$this->request->getPost('nilai_akhir');

        if ($nilai < 0 || $nilai > 100) {
            return redirect()->back()->with('error',
                'Nilai harus antara 0 dan 100!');
        }

        // Mulai Transaction
        $this->db->transStart();
        $this->db->query(
            "INSERT INTO nilai (nim, id_kelas, nilai_akhir)
             VALUES (?, ?, ?)",
            [$nim, $kelas, $nilai]
        );
        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            return redirect()->back()->with('error',
                'Transaksi gagal, data tidak disimpan!');
        }

        // Trigger trg_validasi_insert otomatis berjalan di MySQL
        return redirect()->to('/nilai')
            ->with('success', 'Nilai berhasil disimpan');
    }
}