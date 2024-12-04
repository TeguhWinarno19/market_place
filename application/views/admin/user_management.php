<div class="container-fluid">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <h3>User Management</h3>
            </div>
            <div class="col-6 text-right">
                <a href="<?= base_url('laporan/cetak_laporan_pinjam'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> </a>
                <a href="<?= base_url('laporan/laporan_pinjam_pdf'); ?>" class="btn btn-warning mb-3"><i class="far fa-file-pdf"></i> </a>
                <a href="<?= base_url('laporan/export_excel_pinjam'); ?>" class="btn btn-success mb-3"><i class="far fa-file-excel"></i> </a>
            </div>
        </div>
        <hr>
        <?php if(!empty($pengguna)) { ?>
            <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th class="text-center" scope="col">No</th>
                    <th class="text-center" scope="col">Profile</th>
                    <th scope="col">Nama Pengguna</th>
                    <th scope="col">Email</th>
                    <th scope="col">No Telepon</th>
                    <th class="text-center" scope="col">Role</th>
                    <th class="text-center" scope="col">Status</th>
                    <th class="text-center" scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
            <?php $number = 1 ?>
            <?php foreach ($pengguna as $p) :?>
                <tr>
                    <th scope="row"><?= $number ?></th>
                    <td><img src="<?php echo base_url('/assets/img/profile/'.$p->image) ?>" class="img-fluid img-profile rounded-circle" style="width:50px" alt="Hilang"></td>
                    <td><?= $p->nama ?></td>
                    <td><?= $p->email ?></td>
                    <td><?= $p->no_telepon ?></td>
                    <td class="text-center">
                        <?php if ($p->role == 1) { ?>
                            <p>Admin</p>
                        <?php } else { ?>
                            <p>User</p>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if ($p->aktif == 1) { ?>
                            <p>Aktif</p>
                        <?php } else { ?>
                            <p>Tidak Aktif</p>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php 
                        echo anchor('admin/edit_user/'.$p->id_user, '<div class="btn btn-primary mb-1 mt-1">
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