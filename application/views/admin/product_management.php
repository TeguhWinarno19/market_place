<div class="container-fluid">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <h3>Product Management</h3>
            </div>
            <div class="col-6 text-right">
                <a href="<?= base_url('laporan/cetak_laporan_pinjam'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> </a>
                <a href="<?= base_url('laporan/laporan_pinjam_pdf'); ?>" class="btn btn-warning mb-3"><i class="far fa-file-pdf"></i> </a>
                <a href="<?= base_url('laporan/export_excel_pinjam'); ?>" class="btn btn-success mb-3"><i class="far fa-file-excel"></i> </a>
            </div>
        </div>
        <hr>
        <?php if(!empty($barang)) { ?>
            <table class="table table-striped">
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
                        <?php 
                        $max_length = 25;
                        if(strlen($b->nama_barang) > $max_length) {
                            echo htmlspecialchars(substr($b->nama_barang, 0, $max_length) . '...');
                        } else {
                            echo htmlspecialchars($b->nama_barang);
                        }
                        ?>
                    </td>
                    <td><?= $b->stok ?></td>
                    <td>Rp. <?= number_format($b->harga, 0, ',', '.'); ?></td>
                    <td><?= $b->kategori ?></td>
                    <td><?= $b->nama_toko ?></td>
                    <td><?= $b->kota?></td>
                    <td><?= $b->status_barang?></td>
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