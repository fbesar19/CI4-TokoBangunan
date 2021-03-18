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
            <p class="text-primary m-0 font-weight-bold">Daftar Pegawai</p>
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
                            <th>Username</th>
                            <th>Nama Pegawai</th>
                            <th>Level User</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($user as $u) : ?>
                            <?php if ($u['level'] != '1') : ?>
                                <?php $id = $u['id']; ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $u['username']; ?></td>
                                    <td><?= $u['nama_user']; ?></td>
                                    <td><?= $u['level']; ?></td>
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
                                                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="<?= base_url('/pemilik/edit_pegawai/' . $id); ?>" method="post">
                                                <div class="modal-body">
                                                    <div class="form-group"><label for="productname"><strong>Username</strong></label>
                                                        <input class="form-control" type="text" value="<?= $u['username']; ?>" name="username" required>
                                                    </div>

                                                    <div class="form-group"><label for="productname"><strong>Nama Pegawai</strong></label>
                                                        <input class="form-control" type="text" value="<?= $u['nama_user']; ?>" name="nama" required>
                                                    </div>

                                                    <div class="form-group"><label for="productname"><strong>Password</strong></label>
                                                        <input class="form-control" type="text" value="<?= $u['password']; ?>" name="password" required>
                                                    </div>

                                                    <div class="form-group"><label for="productname"><strong>Level User</strong></label>
                                                        <select class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="level">
                                                            <option value="2" <?php if ($u['level'] == '2') echo 'selected' ?>>Gudang</option>
                                                            <option value="3" <?php if ($u['level'] == '3') echo 'selected' ?>>Kasir</option>
                                                        </select>
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

                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- batas tabel -->

</div>

<?= $this->endSection(); ?>