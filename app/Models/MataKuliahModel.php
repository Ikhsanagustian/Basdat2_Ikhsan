<?php
namespace App\Models;
use CodeIgniter\Model;

class MataKuliahModel extends Model
{
    protected $table            = 'mata_kuliah';
    protected $primaryKey       = 'kode_mk'; // Sesuai PK di Schema Bab 2
    protected $llowedFields    = ['kode_mk', 'nama_mk', 'sks'];
    protected $returnType       = 'array';
    protected $useAutoIncrement = false; // Karena Kode MK diisi manual
}