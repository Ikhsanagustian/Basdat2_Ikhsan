<?php
namespace App\Models;
use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table            = 'mahasiswa';
    protected $primaryKey       = 'nim'; // Sesuai PK di Schema Bab 2
    protected $allowedFields    = ['nim', 'nama_mahasiswa', 'program_studi', 'angkatan', 'jenis_kelamin', 'alamat'];
    protected $returnType       = 'array';
    protected $useAutoIncrement = false; // Karena NIM diisi manual
}