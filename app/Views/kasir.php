<?php

use GuzzleHttp\Client;

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Kasir - Toko Bangunan</title>
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
            <div class="col-md-9">
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
                                        <td><?= rupiah($data['harga_barang']) . "/" . $data['satuan_barang']; ?></td>
                                        <td><?= $data['stok_barang'] . " " . $data['satuan_barang']; ?></td>
                                        <?php if ($data['stok_barang'] == 0) { ?>
                                            <td align="center">
                                                <button class="btn btn-secondary btn-sm d-none d-sm-inline-block" disabled>Tambah</button>
                                            </td>
                                        <?php } else { ?>
                                            <td align="center">
                                                <button class="btn btn-primary btn-sm d-none d-sm-inline-block" data-toggle="modal" data-target="#TambahBarang<?= $id; ?>">Tambah</button>
                                            </td>
                                        <?php } ?>
                                    </tr>

                                    <!-- Modal Delete -->
                                    <div class="modal fade mt-5 pt-5" id="TambahBarang<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tambah ke Keranjang</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Masukan Quantity</label>
                                                        <!-- <input type="number" class="form-control" id="quantity <?= $id; ?>" min="1" max="<?= $data['stok_barang']; ?>" value="1"> -->

                                                        <input type="text" name="quantity" id="quantity<?= $id; ?>" class="form-control" value="1" />

                                                        <input type="hidden" name="hidden_name" id="name<?= $id; ?>" value="<?= $data['nama_barang']; ?>">
                                                        <input type="hidden" name="hidden_price" id="price<?= $id; ?>" value="<?= $data['harga_barang']; ?>">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <!-- <input type="button" name="add_to_cart" id="<?= $id; ?>" class="btn btn-primary" data-dismiss="modal">Konfirmasi</button> -->

                                                    <input type="button" name="add_to_cart" id="<?= $id ?>" class="btn btn-primary add_to_cart" value="Tambahkan" data-dismiss="modal">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Akhir Modal -->

                                <?php endforeach; ?>
                                <?php if ($i == 1) : ?>
                                    <tr>
                                        <td colspan="8" class="text-center"> Tidak ada barang</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">

                <!-- penjualan hari ini -->

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Belanja</h5>
                        <span id="cart_details"></span>
                        <!-- <hr> -->
                        <!-- <span class="total_price">Rp. 0,00</span> -->
                        <!-- <input type="button" name="add_to_cart" id="" style="margin-top:5px;" class="btn btn-primary form-control mt-4 selesai" value="Selesai" /> -->
                    </div>
                </div> <!-- batas penjualan hari ini -->

                </strong>
                </p>
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
<script>
    $(document).ready(function() {

        load_product();

        load_cart_data();

        function load_product() {
            $.ajax({
                url: "fetch_item.php",
                method: "POST",
                success: function(data) {
                    $('#display_item').html(data);
                }
            });
        }

        function load_cart_data() {
            $.ajax({
                url: "fetch_cart.php",
                method: "POST",
                dataType: "json",
                success: function(data) {
                    $('#cart_details').html(data.cart_details);
                    $('.total_price').text(data.total_price);
                    $('.badge').text(data.total_item);
                }
            });
        }

        $(document).on('click', '.add_to_cart', function() {
            var product_id = $(this).attr("id");
            var product_name = $('#name' + product_id + '').val();
            var product_price = $('#price' + product_id + '').val();
            var product_quantity = $('#quantity' + product_id).val();
            var action = "add";
            if (product_quantity > 0) {
                $.ajax({
                    url: "action.php",
                    method: "POST",
                    data: {
                        product_id: product_id,
                        product_name: product_name,
                        product_price: product_price,
                        product_quantity: product_quantity,
                        action: action
                    },
                    success: function(data) {
                        load_cart_data();
                    }
                });
            } else {
                alert("lease Enter Number of Quantity");
            }
        });

        $(document).on('click', '.delete', function() {
            var product_id = $(this).attr("id");
            var action = 'remove';
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {
                    product_id: product_id,
                    action: action
                },
                success: function() {
                    load_cart_data();
                }
            })
        });

        $(document).on('click', '#clear_cart', function() {
            var action = 'empty';
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {
                    action: action
                },
                success: function() {
                    load_cart_data();
                }
            });
        });

    });
</script>