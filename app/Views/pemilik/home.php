<?= $this->extend('pemilik'); ?>

<?= $this->section('content'); ?>


<?php
date_default_timezone_set('Asia/Jakarta');
$date_now = substr(date('Y-m-d'), 0, 7);

$pengeluaran = 0;
$pemasukan = 0;
$labarugi = 0;

$pengeluaranTahunan = 0;
$pemasukanTahunan = 0;
$labarugiTahunan = 0;

foreach ($keuangan as $u) {
    $bulan = date("Y-m-d", strtotime($u['tgl_transaksi']));
    $date_data = substr($bulan, 0, 7);

    if ($u['jenis_transaksi'] == 'pemasukan') {
        $pemasukanTahunan = $pemasukanTahunan + $u['nominal'];
        if ($date_data == $date_now) {
            $pemasukan = $pemasukan + $u['nominal'];
        }
    } else if ($u['jenis_transaksi'] == 'pengeluaran') {
        $pengeluaranTahunan = $pengeluaranTahunan + $u['nominal'];
        if ($date_data == $date_now) {
            $pengeluaran = $pengeluaran + $u['nominal'];
        }
    }
    $labarugi = $pemasukan - $pengeluaran;
    $labarugiTahunan = $pemasukanTahunan - $pengeluaranTahunan;
}
?>

<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Catatan Bulan ini</h3>
        <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="pemilik/print_keuangan_bulanan" target="_blank"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Print Laporan</a>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-4 mb-4">
            <div class="card shadow border-left-primary py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col mr-2">
                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Pendapatan</span></div>
                            <div class="text-dark font-weight-bold h5 mb-0"><span><?= rupiah($pemasukan); ?></span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-dollar fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 mb-4">
            <div class="card shadow border-left-success py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col mr-2">
                            <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>Pengeluaran</span></div>
                            <div class="text-dark font-weight-bold h5 mb-0"><span><?= rupiah($pengeluaran); ?></span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 mb-4">
            <div class="card shadow border-left-info py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col mr-2">
                            <div class="text-uppercase text-info font-weight-bold text-xs mb-1"><span>Keuntungan</span></div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="text-dark font-weight-bold h5 mb-0"><span><?= rupiah($labarugi); ?></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel -->

    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">Daftar Barang Habis</p>
        </div>
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang </th>
                            <th>Harga Barang </th>
                            <th>Satuan Barang </th>
                            <th>Stok Barang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($barang as $u) : ?>
                            <?php $id = $u['id_barang']; ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $u['nama_barang']; ?></td>
                                <td><?= rupiah($u['harga_barang']); ?></td>
                                <td><?= $u['satuan_barang']; ?></td>
                                <td><?= $u['stok_barang']; ?></td>
                            </tr>

                        <?php endforeach; ?>
                        <?php if ($i == 1) : ?>
                            <tr>
                                <td colspan="7" class="text-center"> Tidak ada data</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- batas tabel -->
</div>
<!-- 
<div class="container-fluid mt-5">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Catatan Tahun ini</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="keuangan/print_keuangan_tahunan" target="_blank"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Print Laporan</a>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-4 mb-4">
            <div class="card shadow border-left-primary py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col mr-2">
                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Pendapatan</span></div>
                            <div class="text-dark font-weight-bold h5 mb-0"><span><?= rupiah($pemasukanTahunan); ?></span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-dollar fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 mb-4">
            <div class="card shadow border-left-success py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col mr-2">
                            <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>Pengeluaran</span></div>
                            <div class="text-dark font-weight-bold h5 mb-0"><span><?= rupiah($pengeluaranTahunan); ?></span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 mb-4">
            <div class="card shadow border-left-info py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col mr-2">
                            <div class="text-uppercase text-info font-weight-bold text-xs mb-1"><span>Keuntungan</span></div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="text-dark font-weight-bold h5 mb-0"><span><?= rupiah($labarugiTahunan); ?></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row"></div>
</div> -->

<?php
function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}
?>

<?= $this->endSection(); ?>