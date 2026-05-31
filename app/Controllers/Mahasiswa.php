<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    protected $mhsModel;

    public function __construct() {
        // Inisialisasi model
        $this->mhsModel = new MahasiswaModel();
    }

    // SELECT - Tampil Data
    public function index() {
        $data = [
            'title'     => 'Data Mahasiswa (Bab 3)',
            'mahasiswa' => $this->mhsModel->findAll()
        ];
        return view('mahasiswa/index', $data);
    }

    // INSERT - Form Tambah
    public function tambah() {
        $data = ['title' => 'Tambah Mahasiswa'];
        return view('mahasiswa/form', $data);
    }

    // INSERT - Proses Simpan
    public function simpan() {
        $this->mhsModel->save([
            'nim'            => $this->request->getPost('nim'),
            'nama_mahasiswa' => $this->request->getPost('nama_mahasiswa'),
            'program_studi'  => $this->request->getPost('program_studi'),
            'angkatan'       => $this->request->getPost('angkatan'),
            'jenis_kelamin'   => $this->request->getPost('jenis_kelamin'),
            'alamat'         => $this->request->getPost('alamat')
        ]);
        return redirect()->to('/mahasiswa');
    }

    // DELETE - Hapus Data
    public function hapus($nim) {
        $this->mhsModel->delete($nim);
        return redirect()->to('/mahasiswa');
    }
}