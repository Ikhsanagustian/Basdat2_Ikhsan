<?php
namespace App\Models;
use CodeIgniter\Model;

class TugasBesarModel extends Model {
    protected $db;
    public function __construct() {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    // BAB 4 — INNER JOIN 4 tabel
    public function getTranskrip(?string $nim = null): array {
        $q = $this->db->query(
            "SELECT m.nim, m.nama_mahasiswa,
                    mk.nama_mk, mk.sks,
                    n.nilai_akhir,
                    fn_grade(n.nilai_akhir) AS grade
             FROM mahasiswa m
             INNER JOIN nilai n ON m.nim = n.nim
             INNER JOIN kelas k ON n.id_kelas = k.id_kelas
             INNER JOIN mata_kuliah mk ON k.kode_mk = mk.kode_mk"
            . ($nim ? " WHERE m.nim = '$nim'" : '')
            . " ORDER BY m.nama_mahasiswa, mk.nama_mk"
        );
        return $q->getResultArray();
    }

    // BAB 7 — Gunakan VIEW vw_rekap_ipk
    public function getRekapIPK(): array {
        return $this->db->query(
            'SELECT * FROM vw_rekap_ipk ORDER BY rata_rata DESC'
        )->getResultArray();
    }

    // BAB 8 — Panggil Stored Procedure
    public function getStatusLulus(string $nim): ?array {
        $this->db->query("CALL sp_status_lulus('$nim')");
        $result = $this->db->connID->store_result();
        $row    = $result ? $result->fetch_assoc() : null;
        $this->db->connID->next_result();
        return $row;
    }

    // BAB 5 — Aggregate Function
    public function getStatistikNilai(): array {
        return $this->db->query(
            "SELECT mk.nama_mk,
                    COUNT(n.id_nilai) AS peserta,
                    ROUND(AVG(n.nilai_akhir),2) AS rata_rata,
                    MAX(n.nilai_akhir) AS tertinggi,
                    MIN(n.nilai_akhir) AS terendah
             FROM nilai n
             JOIN kelas k ON n.id_kelas = k.id_kelas
             JOIN mata_kuliah mk ON k.kode_mk = mk.kode_mk
             GROUP BY mk.nama_mk"
        )->getResultArray();
    }

    // BAB 6 — Subquery: Mahasiswa belum nilai
    public function getMahasiswaBelumNilai(): array {
        return $this->db->query(
            "SELECT nama_mahasiswa, angkatan
             FROM mahasiswa
             WHERE nim NOT IN (SELECT nim FROM nilai)"
        )->getResultArray();
    }
}