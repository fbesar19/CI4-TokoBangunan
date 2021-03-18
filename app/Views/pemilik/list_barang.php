<?= $this->extend('pemilik'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <?php if (!empty(session()->getFlashdata('pesan'))) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0"><?= $title; ?></h3>
        <!-- <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Print Laporan</a> -->
    </div>

    <!-- Tabel -->

    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">Daftar Barang</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-md-left dataTables_filter" id="dataTable_filter"><label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                </div>
            </div>
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Harga Barang</th>
                            <th>Satuan Barang</th>
                            <th>Stok Barang</th>
                            <th>Action</th>
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
                                <td>
                                    <button class="btn btn-primary btn-sm d-none d-sm-inline-block" data-toggle="modal" data-target="#modalEdit<?= $id; ?>">Edit</button>
                                    <button class="btn btn-danger btn-sm d-none d-sm-inline-block" data-toggle="modal" data-target="#modalDelete<?= $id; ?>">Delete</button>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="modalEdit<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="<?= base_url('/pemilik/edit_barang/' . $id); ?>" method="post">
                                            <div class="modal-body">
                                                <div class="form-group"><label for="productname"><strong>Nama Barang</strong></label>
                                                    <input class="form-control" type="text" value="<?= $u['nama_barang']; ?>" name="nama_barang" required>
                                                </div>

                                                <div class="form-group"><label for="productname"><strong>Harga Barang</strong></label>
                                                    <input class="form-control" type="text" value="<?= $u['harga_barang']; ?>" name="harga_barang" required>
                                                </div>

                                                <div class="form-group"><label for="productname"><strong>Satuan Barang</strong></label>
                                                    <input class="form-control" type="text" value="<?= $u['satuan_barang']; ?>" name="satuan_barang" required>
                                                </div>

                                                <div class="form-group"><label for="productname"><strong>Stok Barang</strong></label>
                                                    <input class="form-control" type="text" value="<?= $u['stok_barang']; ?>" name="stok_barang" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Modal -->

                            <!-- Modal Delete -->
                            <div class="modal fade mt-5 pt-5" id="modalDelete<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="<?= base_url('/pemilik/delete_barang/' . $id); ?>" method="post">
                                            <div class="modal-body">
                                                <p>Apakah benar anda ingin menghapus data ini?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="submit" class="btn btn-primary">Konfirmasi</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Modal -->

                        <?php endforeach; ?>
                        <?php if ($i == 1) : ?>
                            <tr>
                                <td colspan="7" class="text-center">
                                    <p>Tidak ada barang</p>
                                    <a href="<?= base_url('/pemilik/tambah_barang'); ?>" class="btn btn-primary btn-sm d-none d-sm-inline-block mb-3">Tambah Barang</button>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- batas tabel -->

</div>

<?php
function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}
?>

<?= $this->endSection(); ?>