<?php
namespace App\Models;
use CodeIgniter\Model;

class DosenModel extends Model
{
    protected $table            = 'dosen';
    protected $primaryKey       = 'nidn'; // Sesuai PK di Schema Bab 2
    protected $allowedFields    = ['nidn', 'nama_dosen', 'program_studi', 'jabatan',];
    protected $returnType       = 'array';
    protected $useAutoIncrement = false; // Karena NIM diisi manual
}