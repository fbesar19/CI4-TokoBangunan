<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    protected $dateTime = 'date';
    protected $allowedFields = ['nama_barang', 'harga_barang', 'satuan_barang', 'stok_barang'];

    public function barangKosong()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('barang');
        $array = ['stok_barang' => '0'];
        $builder->where($array);
        return $builder->get()->getResultArray();
    }
}
