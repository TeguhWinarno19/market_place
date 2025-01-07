<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h3><strong>User Management</strong></h3>
                </div>
                <div class="col-6 text-right">
                    <a href="<?= base_url('admin/cetak_user_management'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> Cetak Data User</a>
                    <a href="<?= base_url('admin/excel_user_management'); ?>" class="btn btn-success mb-3"><i class="far fa-file-excel"></i> Export Data User</a>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
            <?php if(!empty($pengguna)) { ?>
                <table class="table table-striped table-hover">
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
                                <a href="<?= base_url('admin/ubah_nonaktif/'.$p->id_user)?>" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Klik untuk Nonaktifkan">Aktif</a>
                            <?php } else { ?>
                                <a href="<?= base_url('admin/ubah_aktif/'.$p->id_user)?>" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Klik untuk aktifkan">Nonaktif</a>
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            
                            <?php
                            if ($p->role == 1){
                                echo anchor('admin/user_management#', '<div class="btn btn-secondary mb-1 mt-1 data-bs-toggle="tooltip" data-bs-placement="top" title="Tidak dapat Ubah Sesama Admin"">
                                <i class="fas fa-cogs"></i>
                                </div>');
                            } else {
                                echo anchor('admin/edit_user/'.$p->id_user, '<div class="btn btn-primary mb-1 mt-1 data-bs-toggle="tooltip" data-bs-placement="top" title="Klik Untuk mengubah data ini"">
                                <i class="fas fa-cogs"></i>
                                </div>');
                            }
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