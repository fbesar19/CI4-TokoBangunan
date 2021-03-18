<?php


namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;

class Pemilik extends BaseController
{

	protected $barangModel;
	protected $transaksiModel;
	protected $userModel;

	public function __construct()
	{
		$this->barangModel = new BarangModel();
		$this->transaksiModel = new TransaksiModel();
		$this->userModel = new UserModel();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		if (session()->get('pemilik') == '') {
			session()->setFlashdata('warning', 'Anda Belum Login');
			return redirect()->to(base_url('login'));
		}

		$keuangan = $this->transaksiModel->findAll();
		$barangKosong = $this->barangModel->barangKosong();
		$data = [
			'title' => 'Dashboard',
			'keuangan' => $keuangan,
			'barang' => $barangKosong
		];
		return view('pemilik/home', $data);
	}

	// CRUD SISTEM
	public function create_transaksi()
	{
		$tanggal = date('d-m-Y');
		$this->transaksiModel->save([
			'nama_transaksi' => $this->request->getVar('nama_transaksi'),
			'nominal' => $this->request->getVar('nominal'),
			'jenis_transaksi' => $this->request->getVar('jenis_transaksi'),
			'tgl_transaksi' => $tanggal
		]);

		session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
		return redirect()->to('/pemilik/transaksi');
	}

	public function konfirmasi_pengadaan($id)
	{
		if (session()->get('pemilik')) {
			$this->pengadaanModel->delete($id);
			session()->setFlashdata('pesan', 'Pengadaan Berhasil Dikonfirmasi');
			return redirect()->to(base_url('/pemilik'));
		}
	}

	public function delete_transaksi($id)
	{
		if (session()->get('pemilik')) {
			$this->transaksiModel->delete($id);
			session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
			return redirect()->to(base_url('/pemilik/transaksi'));
		}
	}

	public function edit_transaksi($id, $tanggal, $keterangan)
	{
		if (session()->get('pemilik')) {
			$this->transaksiModel->save([
				'id_transaksi' => $id,
				'nama_transaksi' => $this->request->getVar('nama_transaksi'),
				'nominal' => $this->request->getVar('nominal'),
				'jenis_transaksi' => $keterangan,
				'tgl_transaksi' => $tanggal
			]);

			session()->setFlashdata('pesan', 'Data Berhasil Diubah');
			return redirect()->to(base_url('/pemilik/transaksi'));
		}
	}

	public function save_barang()
	{
		$this->barangModel->save([
			'nama_barang' => $this->request->getVar('nama_barang'),
			'harga_barang' => $this->request->getVar('harga_barang'),
			'satuan_barang' => $this->request->getVar('satuan_barang'),
			'stok_barang' => $this->request->getVar('stok_barang')
		]);

		session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

		return redirect()->to('/pemilik/list_barang');
	}

	public function edit_barang($id)
	{
		$this->barangModel->save([
			'id_barang' => $id,
			'nama_barang' => $this->request->getVar('nama_barang'),
			'harga_barang' => $this->request->getVar('harga_barang'),
			'satuan_barang' => $this->request->getVar('satuan_barang'),
			'stok_barang' => $this->request->getVar('stok_barang')
		]);

		session()->setFlashdata('pesan', 'Data berhasil diubah');

		return redirect()->to('/pemilik/list_barang');
	}

	public function delete_barang($id)
	{
		if (session()->get('pemilik')) {
			$this->barangModel->delete($id);
			session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
			return redirect()->to(base_url('/pemilik/list_barang'));
		}
	}

	public function save_pegawai()
	{
		$this->userModel->save([
			'nama_user' => $this->request->getVar('nama'),
			'username' => $this->request->getVar('username'),
			'password' => $this->request->getVar('password'),
			'level' => $this->request->getVar('level')
		]);

		session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

		return redirect()->to('/admin/list_pegawai');
	}

	public function edit_pegawai($id)
	{
		$this->userModel->save([
			'id' => $id,
			'nama_user' => $this->request->getVar('nama'),
			'username' => $this->request->getVar('username'),
			'password' => $this->request->getVar('password'),
			'level' => $this->request->getVar('level')
		]);

		session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

		return redirect()->to('/admin/list_pegawai');
	}

	public function delete_pegawai($id)
	{
		if (session()->get('pemilik')) {
			$this->userModel->delete($id);
			session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
			return redirect()->to(base_url('/pemilik/list_pegawai'));
		}
	}

	// BATAS CRUD

	public function tambah_transaksi()
	{
		if (session()->get('pemilik') == '') {
			session()->setFlashdata('warning', 'Anda Belum Login');
			return redirect()->to(base_url('login'));
		}
		$data = [
			'title' => 'Tambah Transaksi'
		];
		return view('pemilik\tambah_transaksi', $data);
	}

	public function transaksi()
	{
		if (session()->get('pemilik') == '') {
			session()->setFlashdata('warning', 'Anda Belum Login');
			return redirect()->to(base_url('login'));
		}

		$transaksi = $this->transaksiModel->findAll();

		$data = [
			'title' => 'Transaksi',
			'transaksi' => $transaksi
		];
		return view('pemilik\transaksi', $data);
	}

	public function print_laporan_bulanan()
	{
		if (session()->get('pemilik') == '') {
			session()->setFlashdata('warning', 'Anda Belum Login');
			return redirect()->to(base_url('login'));
		}

		$transaksi = $this->transaksiModel->findAll();
		$data = [
			'title' => 'Dashboard',
			'transaksi' => $transaksi
		];
		return view('laporan/print_laporan_bulanan', $data);
	}

	public function tambah_barang()
	{
		if (session()->get('pemilik') == '') {
			session()->setFlashdata('warning', 'Anda Belum Login');
			return redirect()->to(base_url('login'));
		}

		$data = [
			'title' => 'Tambah Barang',
		];
		return view('pemilik/tambah_barang', $data);
	}

	public function list_barang()
	{
		if (session()->get('pemilik') == '') {
			session()->setFlashdata('warning', 'Anda Belum Login');
			return redirect()->to(base_url('login'));
		}

		$barang = $this->barangModel->findAll();
		$data = [
			'title' => 'List Barang',
			'barang' => $barang
		];
		return view('pemilik/list_barang', $data);
	}

	public function list_pegawai()
	{
		if (session()->get('pemilik') == '') {
			session()->setFlashdata('warning', 'Anda Belum Login');
			return redirect()->to(base_url('login'));
		}

		$user = $this->userModel->findAll();
		$data = [
			'title' => 'List Pegawai',
			'user' => $user
		];
		return view('pemilik/list_pegawai', $data);
	}

	public function tambah_pegawai()
	{
		if (session()->get('pemilik') == '') {
			session()->setFlashdata('warning', 'Anda Belum Login');
			return redirect()->to(base_url('login'));
		}

		$data = [
			'title' => 'Tambah Pegawai'
		];
		return view('pemilik/tambah_pegawai', $data);
	}

	public function print_keuangan_bulanan()
	{
		if (session()->get('pemilik') == '') {
			session()->setFlashdata('warning', 'Anda Belum Login');
			return redirect()->to(base_url('login'));
		}
		$transaksi = $this->transaksiModel->findAll();

		$data = [
			'title' => 'Keuangan Bulanan',
			'transaksi' => $transaksi
		];
		return view('laporan\laporan_keuangan_bulanan', $data);
	}
}
