<div class="container-fluid">
    <?php
    $total_toko = 0;
    $toko_aktif = 0;
    if (!empty($toko)){
        foreach ($toko as $t):
            $total_toko++;
            if($t->status == 1){$toko_aktif++;}
        endforeach;
    }
    else {
        $total_toko = 0;
    }
    ?>
    <div class="card">
        <div class="card-body">
        <div class="row">
            <div class="col-6">
                <h3>Shop Management</h3>
            </div>
            <div class="col-6 text-right">
                <a href="<?= base_url('admin/cetak_shop_management'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> </a>
                <a href="<?= base_url('admin/excel_shop_management'); ?>" class="btn btn-success mb-3"><i class="far fa-file-excel"></i> </a>
            </div>
        </div>
        <hr>
        <div class="table-responsive">
        <?php if(!empty($toko)) { ?>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th class="text-center" scope="col">No</th>
                    <th class="text-center" scope="col">Profile</th>
                    <th scope="col">Nama Toko</th>
                    <th scope="col">Pemilik</th>
                    <th scope="col">Status toko</th>
                    <th scope="col">Kota</th>
                    <th scope="col">Bank</th>
                    <th scope="col">Rekening</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
            <?php $number = 1 ?>
            <?php foreach ($toko as $p) :?>
                <tr>
                    <th scope="row"><?= $number ?></th>
                    <td><img src="<?php echo base_url('/assets/img/profile_toko/'.$p->logo_toko) ?>" class="img-fluid img-profile rounded-circle" style="width:50px" alt="Hilang"></td>
                    <td><?= $p->nama_toko ?></td>
                    <td><?= $p->nama ?></td>
                    <td>
                        <?php if($p->status == '0'){?>
                        <a href="<?= base_url('admin/ubah_nonaktif_shop/'.$p->id_toko)?>" class="btn btn-success">Aktif</a>
                        <?php } else { ?>
                        <a href="<?= base_url('admin/ubah_aktif_shop/'.$p->id_toko)?>" class="btn btn-danger">Nonaktif</a>
                        <?php } ?>
                    </td>
                    <td><?= $p->kota ?></td>
                    <td><?= $p->bank ?></td>
                    <td><?= $p->no_rekening ?></td>
                    <td class="text-center">
                        <?php 
                        echo anchor('admin/edit_toko/'.$p->id_toko, '<div class="btn btn-primary mb-1 mt-1">
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