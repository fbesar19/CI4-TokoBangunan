<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Gudang extends BaseController
{
	protected $barangModel;

	public function __construct()
	{
		$this->barangModel = new BarangModel();
		date_default_timezone_set('Asia/Jakarta');
	}
	public function index()
	{
		if (session()->get('gudang') == '') {
			session()->setFlashdata('warning', 'Anda Belum Login');
			return redirect()->to(base_url('login'));
		}

		$barang = $this->barangModel->findAll();
		$data = [
			'title' => 'Dashboard',
			'barang' => $barang
		];
		return view('gudang', $data);
	}
}
