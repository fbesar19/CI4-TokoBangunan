<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $dateTime = 'date';
    protected $allowedFields = ['nama_transaksi', 'nominal', 'jenis_transaksi', 'tgl_transaksi'];

    public function getPengeluaran()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('transaksi');
        $array = ['jenis_transaksi' => 'pengeluaran'];
        $builder->orderBy('tgl_transaksi DESC');
        $builder->where($array);
        return $builder->get()->getResultArray();
    }
    public function pemasukanToday()
    {
        $db = \Config\Database::connect();
        $tanggal = date('d-m-Y');
        $builder = $db->table('transaksi');
        $array = ['tgl_transaksi' => $tanggal, 'jenis_transaksi' => 'pemasukan'];
        $builder->where($array);
        return $builder->get()->getResultArray();
    }

    public function getPemasukan()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('transaksi');
        $array = ['jenis_transaksi' => 'pemasukan'];
        $builder->orderBy('tgl_transaksi DESC');
        $builder->where($array);
        return $builder->get()->getResultArray();
    }
}
