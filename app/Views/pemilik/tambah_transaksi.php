<?= $this->extend('pemilik'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="row">
                <div class="col" style="width: 630px;">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Tambah Transaksi</p>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('/pemilik/create_transaksi'); ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="form-row">
                                    <div class="col">
                                        <!-- Form Nama Produk -->
                                        <div class="form-group"><label for="productname"><strong>Keterangan</strong></label>
                                            <input class="form-control" type="text" placeholder="masukan keterangan transaksi" name="nama_transaksi">
                                        </div>
                                        <!-- Form Nama Produk -->
                                        <div class="form-group"><label for="productname"><strong>Nominal</strong></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">RP</span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="nominal">
                                            </div>
                                        </div>
                                        <!-- Form Nama Produk -->
                                        <div class="form-group"><label for="productname"><strong>Jenis Transaksi</strong></label>
                                            <select name="jenis_transaksi" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                                <option value="pemasukan" selected="">Pemasukan</option>
                                                <option value="pengeluaran">Pengeluaran</option>
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