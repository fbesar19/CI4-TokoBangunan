<?php


namespace App\Controllers;

use App\Models\BarangModel;

class Kasir extends BaseController
{

	protected $barangModel;

	public function __construct()
	{
		$this->barangModel = new BarangModel();
		date_default_timezone_set('Asia/Jakarta');
	}
	public function index()
	{
		if (session()->get('kasir') == '') {
			session()->setFlashdata('warning', 'Anda Belum Login');
			return redirect()->to(base_url('login'));
		}

		$barang = $this->barangModel->findAll();
		$data = [
			'title' => 'Dashboard',
			'barang' => $barang
		];
		return view('kasir', $data);
	}

	public function print_struk($isian)
	{
		if (session()->get('kasir') == '') {
			session()->setFlashdata('warning', 'Anda Belum Login');
			return redirect()->to(base_url('login'));
		}

		$data = [
			'title' => 'Dashboard',
			'isian' => $isian
		];
		return view('struk_pembelian', $data);
	}

	public function konfirmasi_pembayaran($id, $nama, $email, $alamat, $keterangan, $nominal, $tanggal)
	{
		$data = [
			"nama_pendaftar"  => $nama,
			"alamat_email" => $email,
			"alamat_pendaftar" => $alamat,
			"keterangan" => $keterangan,
			"nominal" => $nominal,
			"status_pendaftaran" => "sudah dibayar",
			"status_pemeriksaan" => "belum diperiksa",
			"tanggal_pendaftaran" => $tanggal,
			"id" => $id
		];

		$this->transaksiModel->save([
			'nama_transaksi' => $keterangan,
			'nominal' => $nominal,
			'tgl_transaksi' => $tanggal
		]);
		return redirect()->to(base_url('kasir'));
	}

	public function tambah_barang()
	{
		$tanggal = date('d-m-Y');
		$nominal = 0;
		return redirect()->to(base_url('kasir'));
	}
}
