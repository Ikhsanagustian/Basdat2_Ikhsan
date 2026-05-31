<?php

namespace App\Controllers;

use App\Models\MataKuliahModel;

class MataKuliah extends BaseController
{
    protected $mkModel;

    public function __construct() {
        // Inisialisasi model
        $this->mkModel = new MataKuliahModel();
    }

    // SELECT - Tampil Data
    public function index() {
        $db = \Config\Database::connect();
        // Sesuai nama tabel kamu: mata_kuliah
        $data['matkul'] = $db->table('mata_kuliah')->get()->getResultArray();
        $data['title'] = 'Data Mata Kuliah';
        return view('matakuliah/index', $data);
    }

    // INSERT - Form Tambah
    public function tambah() {
        $data = ['title' => 'Tambah Mata Kuliah'];
        return view('matakuliah/form', $data);
    }

    // INSERT - Proses Simpan
    public function simpan() {
        $this->mkModel->save([
            'kode_mk'            => $this->request->getPost('kode_mk'),
            'nama_mk' => $this->request->getPost('nama_mk'),
            'sks'  => $this->request->getPost('sks'),
        ]);
        return redirect()->to('/matakuliah');
    }

    // DELETE - Hapus Data
    public function hapus($kode_mk) {
        $this->mkModel->delete($kode_mk);
        return redirect()->to('/matakuliah');
    }
}