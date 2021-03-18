<?= $this->extend('pemilik'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="row">
                <div class="col" style="width: 630px;">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Tambah Barang</p>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('/pemilik/save_barang'); ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="form-row">
                                    <div class="col">
                                        <!-- Form Nama Produk -->
                                        <div class="form-group"><label for="productname"><strong>Nama Barang</strong></label>
                                            <input class="form-control" type="text" placeholder="masukan nama barang" name="nama_barang" required>
                                        </div>
                                        <!-- Form Nama Produk -->
                                        <div class="form-group"><label for="productname"><strong>Harga Barang</strong></label>
                                            <input class="form-control" type="text" placeholder="masukan harga barang" name="harga_barang" required>
                                        </div>
                                        <!-- Form Nama Produk -->
                                        <div class="form-group"><label for="productname"><strong>Satuan Barang</strong></label>
                                            <input class="form-control" type="text" placeholder="masukan satuan, contoh: kg" name="satuan_barang" required>
                                        </div>
                                        <!-- Form Nama Produk -->
                                        <div class="form-group"><label for="productname"><strong>Stok Barang</strong></label>
                                            <input class="form-control" type="text" placeholder="masukan stok barang" name="stok_barang" required>
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