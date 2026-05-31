<?php

namespace App\Controllers;

use App\Models\DosenModel;

class Dosen extends BaseController
{
    protected $dsnModel;

    public function __construct() {
        // Inisialisasi model
        $this->dsnModel = new DosenModel();
    }

    // SELECT - Tampil Data
    public function index() {
        $data = [
            'title'     => 'Data Dosen (Bab 3)',
            'dosen' => $this->dsnModel->findAll()
        ];
        return view('dosen/index', $data);
    }

    // INSERT - Form Tambah
    public function tambah() {
        $data = ['title' => 'Tambah Dosen'];
        return view('dosen/form', $data);
    }

    // INSERT - Proses Simpan
    public function simpan() {
        $this->dsnModel->save([
            'nidn'            => $this->request->getPost('nidn'),
            'nama_dosen' => $this->request->getPost('nama_dosen'),
            'program_studi'  => $this->request->getPost('program_studi'),
            'jabatan'       => $this->request->getPost('jabatan'),
        ]);
        return redirect()->to('/dosen');
    }

    // DELETE - Hapus Data
    public function hapus($nidn) {
        $this->dsnModel->delete($nidn);
        return redirect()->to('/dosen');
    }
}