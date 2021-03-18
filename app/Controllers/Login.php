<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Login extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->LoginModel = new LoginModel();
	}

	public function index()
	{
		return view('login');
	}

	public function cek_login()
	{
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');

		$cek = $this->LoginModel->cek_login($username, $password);

		if (isset($cek['username']) && isset($cek['password'])) {
			if ($cek['level'] == '1') {
				session()->set('pemilik', $cek['username']);
				session()->set('nama', $cek['nama_user']);
				return redirect()->to(base_url('pemilik'));
			} else if ($cek['level'] == '2') {
				session()->set('gudang', $cek['username']);
				session()->set('nama', $cek['nama_user']);
				return redirect()->to(base_url('gudang'));
			} else if ($cek['level'] == '3') {
				session()->set('kasir', $cek['username']);
				session()->set('nama', $cek['nama_user']);
				return redirect()->to(base_url('kasir'));
			}
		} else {
			session()->setFlashdata('warning', 'Username dan Password Salah');
			return redirect()->to(base_url('login'));
		}
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to(base_url('login'));
	}
}
