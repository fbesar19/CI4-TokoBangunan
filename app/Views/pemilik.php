<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Pemilik - Klinik App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.3/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-text mx-3"><span>Toko Bangunan</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">

                    <li class="nav-item">
                        <a class="nav-link  <?php if ($title == 'Dashboard') echo 'active' ?>" href="<?= base_url('/pemilik'); ?>">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <hr class="sidebar-divider">

                    <div class="sidebar-heading">
                        Keuangan
                    </div>

                    <li class="nav-item">
                        <a class="nav-link collapsed <?php if ($title == 'Tambah Transaksi') echo 'active' ?>" href="<?= base_url('/pemilik/tambah_transaksi'); ?>">
                            <i class="fas fa-plus"></i>
                            <span> Tambah Transaksi</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link collapsed <?php if ($title == 'Transaksi') echo 'active' ?>" href="<?= base_url('/pemilik/transaksi'); ?>">
                            <i class="fas fa-fw fa-dollar-sign"></i>
                            <span>Catatan Transaksi</span>
                        </a>
                    </li>

                    <!-- 
                    <li class="nav-item">
                        <a class="nav-link collapsed <?php if ($title == 'Pengeluaran') echo 'active' ?>" href="<?= base_url('/pemilik/pengeluaran'); ?>">
                            <i class="fas fa-fw fa-arrow-down"></i>
                            <span>Pengeluaran</span>
                        </a>
                    </li> -->

                    <hr class="sidebar-divider">

                    <div class="sidebar-heading">
                        Barang
                    </div>

                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == 'Tambah Barang') echo 'active' ?>" href="<?= base_url('/pemilik/tambah_barang'); ?>">
                            <i class="fas fa-fw fa-plus"></i>
                            <span>Tambah Barang</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == 'List Barang') echo 'active' ?>" href="<?= base_url('/pemilik/list_barang'); ?>">
                            <i class="fas fa-fw fa-clipboard-list"></i>
                            <span>List Barang</span>
                        </a>
                    </li>


                    <hr class="sidebar-divider">

                    <div class="sidebar-heading">
                        Pegawai
                    </div>

                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == 'Tambah Pegawai') echo 'active' ?>" href="<?= base_url('/pemilik/tambah_pegawai'); ?>">
                            <i class="fas fa-fw fa-plus"></i>
                            <span>Tambah Pegawai</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == 'List Pegawai') echo 'active' ?>" href="<?= base_url('/pemilik/list_pegawai'); ?>">
                            <i class="fas fa-fw fa-clipboard-list"></i>
                            <span>List Pegawai</span>
                        </a>
                    </li>

                    <hr class="sidebar-divider">

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/login/logout'); ?>">
                            <i class="fas fa-fw fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li>

                </ul>
                <!-- <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div> -->
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <div class="input-group-append"></div>
                            </div>
                        </form>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">Pemilik</span></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in">
                                        <a class="dropdown-item" href="<?= base_url('/'); ?>"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

                <?= $this->renderSection('content') ?>

            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Toko Bangunan</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="/js/theme.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>
        $('#example').DataTable();
    </script>
</body>

</html>