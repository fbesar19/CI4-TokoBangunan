<?= $this->extend('pemilik'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="row">
                <div class="col" style="width: 630px;">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Tambah Pegawai</p>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('/admin/save_user'); ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="form-row">
                                    <div class="col">
                                        <!-- Form Nama Produk -->
                                        <div class="form-group"><label for="productname"><strong>Username</strong></label>
                                            <input class="form-control" type="text" placeholder="masukan username" name="username" required>
                                        </div>
                                        <!-- Form Nama Produk -->
                                        <div class="form-group"><label for="productname"><strong>Nama Pegawai</strong></label>
                                            <input class="form-control" type="text" placeholder="masukan nama" name="nama" required>
                                        </div>
                                        <!-- Form Nama Produk -->
                                        <div class="form-group"><label for="productname"><strong>Password</strong></label>
                                            <input class="form-control" type="text" placeholder="masukan password" name="password" required>
                                        </div>
                                        <div class="form-group"><label for="productname"><strong>Level User</strong></label>
                                            <select class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="level">
                                                <option value="2" selected="">Gudang</option>
                                                <option value="3">Kasir</option>
                                            </select>
                                        </div>
                                        <button class="btn btn-primary btn-block" type="submit">Tambah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>