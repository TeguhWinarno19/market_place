<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h3><strong>Product Management</strong></h3>
                </div>
                <div class="col-6 text-right">
                    <a href="<?= base_url('admin/cetak_product_management'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> Cetak Data Produk</a>
                    <a href="<?= base_url('admin/excel_product_management'); ?>" class="btn btn-success mb-3"><i class="far fa-file-excel"></i> Export Data Produk</a>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
            <?php if(!empty($barang)) { ?>
                <table class="table table-striped table-responsive">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center" scope="col">No</th>
                        <th class="text-center" scope="col">Gambar</th>
                        <th scope="col" >Nama barang</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Toko</th>
                        <th>Kota</th>
                        <th>Status</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                <?php $number = 1 ?>
                <?php foreach ($barang as $b) :?>
                    <tr>
                        <th scope="row"><?= $number ?></th>
                        <td><img src="<?php echo base_url('/assets/img/product/'.$b->gambar) ?>" class="img-fluid img-profile rounded-circle" style="width:50px" alt="Hilang"></td>
                        <td>
                            <h6>
                            <?php 
                            $max_length = 25;
                            if(strlen($b->nama_barang) > $max_length) {
                                echo htmlspecialchars(substr($b->nama_barang, 0, $max_length) . '...');
                            } else {
                                echo htmlspecialchars($b->nama_barang);
                            }
                            ?>
                            </h6>
                        </td>
                        <td><h6><?= $b->stok ?></h6></td>
                        <td><h6>Rp. <?= number_format($b->harga, 0, ',', '.'); ?></h6></td>
                        <td><h6><?= $b->kategori ?></h6></td>
                        <td><h6><?= $b->nama_toko ?></h6></td>
                        <td><h6><?= $b->kota?></h6></td>
                        <td>
                            <?php if($b->status_barang == 'aktif'){?>
                            <a class="btn btn-success btn-block" href="<?= base_url('admin/ubah_nonaktif_barang/'.$b->id_barang) ?>">Aktif</a>
                            <?php } else {?>
                            <a class="btn btn-danger btn-block" href="<?= base_url('admin/ubah_aktif_barang/'.$b->id_barang) ?>">Nonaktif</a>
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <?php 
                            echo anchor('admin/edit_barang/'.$b->id_barang, '<div class="btn btn-primary mb-1 mt-1">
                            <i class="fas fa-cogs"></i>
                            </div>');
                            ?>
                        </td>
                    </tr>
                    <?php $number++ ?>
                <?php endforeach ?>
                </tbody>
                </table>
            <?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tambah_kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Input Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(). 'admin/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" name="nama_kategori" class="form-control">
                    </div>        
                    <div class="form-group">
                        <label>Gambar kategori</label><br>
                        <input type="file" name="gambar_kategori" class="form-control">
                    </div>
                 <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
    </div>
    </div>
</div>