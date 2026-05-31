<?php
namespace App\Controllers;

class Auth extends BaseController {
    public function login() {
        return view('auth/login');
    }

    public function proses_login() {
        $db = \Config\Database::connect();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $admin = $db->table('admin')->where('username', $username)->get()->getRowArray();

        if ($admin && $password == $admin['password']) {
            // Jika sukses, simpan data ke Session
            session()->set([
                'isLoggedIn' => true,
                'username'   => $admin['username'],
                'nama'       => $admin['nama_lengkap']
            ]);
            return redirect()->to('/');
        } else {
            return redirect()->back()->with('error', 'Username atau Password salah!');
        }
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/login');
    }
}