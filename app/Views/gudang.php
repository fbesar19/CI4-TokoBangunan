<?php

use GuzzleHttp\Client;

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Kasir - Klinik App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
</head>

<body id="page-top">

    <!-- navigasi -->
    <nav class="navbar navbar-light navbar-expand bg-primary shadow mb-4 topbar static-top">
        <div class="container"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
            <p class="navbar-brand text-white mt-3">Toko Bangunan</p>
            <ul class="nav navbar-nav flex-nowrap ml-auto">
                <div class="d-none d-sm-block topbar-divider"></div>
                <li class="nav-item dropdown no-arrow">
                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-white small"><?= session()->get('nama') ?></span></a>
                        <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in">
                            <a class="dropdown-item" href="<?= base_url('login/logout'); ?>"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- batas navigasi -->

    <div class="container">
        <div class="row pt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Daftar Barang</p>
                    </div>
                    <div class="card-body">

                        <table id="example" class="table my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Barang</th>
                                    <th>Stok Barang</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($barang as $data) :
                                    $id = $data['id_barang'];
                                ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $data['nama_barang']; ?></td>
                                        <td><?= rupiah($data['harga_barang']) . "/kg"; ?></td>
                                        <td><?= $data['stok_barang']; ?></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm d-none d-sm-inline-block" data-toggle="modal" data-target="#TambahBarang">Edit</button>
                                            <button class="btn btn-danger btn-sm d-none d-sm-inline-block" data-toggle="modal" data-target="#DeleteBarang">Delete</button>
                                        </td>
                                    </tr>

                                    <!-- Modal Delete -->
                                    <div class="modal fade mt-5 pt-5" id="TambahBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tambah ke Keranjang</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="" method="post">
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1" class="form-label">Masukan Quantity</label>
                                                            <input type="number" class="form-control" id="qty_pembelian" min="1" value="1">
                                                        </div>
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
                                        <td colspan="8" class="text-center"> Tidak ada pendaftar</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    function rupiah($angka)
    {

        $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
        return $hasil_rupiah;
    }
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>
        $('#example').DataTable();
    </script>
</body>

</html>