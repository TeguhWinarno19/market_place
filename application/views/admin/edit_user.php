<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h3><i class="fas fa-edit"></i>EDIT DATA USER</h3>
            <hr>
            <?php foreach ($pengguna as $b) : ?>
                <form action="<?php echo base_url(). 'admin/edit_user/'.$b->id_user; ?>" method="post" enctype="multipart/form-data">                            
                    <div class="row">
                        <div class="col col-lg-4 col-md-12 col-sm-12 col-12 mt-2">       
                            <div class="form-group mb-3">
                                <h6>Profile</h6>
                                <img src="<?= base_url("assets/img/profile/") . $b->image ?>" class="img-thumbnail" alt="Product Image">
                                <input type="text" name="old" class="form-control shadow-sm rounded-lg p-3" value="<?= $b->image?>" placeholder="Gambar" hidden>
                                <div class="custom-file mt-2">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>             
                            <?= form_error('id_kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-sm-12 col-12 mt-2">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control shadow-sm rounded-lg p-3" value="<?= $b->email ?>" placeholder="Email" readonly>
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Nama User</label>
                                <input type="text" name="nama_user" class="form-control shadow-sm rounded-lg p-3" value="<?= $b->nama ?>" placeholder="Nama User">
                                <input type="text" name="id_user" class="form-control shadow-sm rounded-lg p-3" value="<?= $b->id_user ?>" placeholder="ID User" hidden>
                                <?= form_error('nama_user', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="row">
                                <div class="col col-6">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <?php if($b->role == 1){
                                            $peran = "Admin";
                                        } else{
                                            $peran = "User";
                                        } ?>
                                        <select class="form-control" name="role" id="">
                                            <option value="<?= $b->role ?>"><?= $peran ?></option>
                                            <hr>
                                            <option value="1">Admin</option>
                                            <option value="2">User</option>
                                        </select>
                                        <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col col-6">
                                    <div class="form-group">
                                        <label>Status Aktivasi</label>
                                        <?php if($b->aktif == 1){
                                            $peran = "aktif";
                                        } else{
                                            $peran = "non-aktif";
                                        } ?>
                                        <select class="form-control" name="aktif" id="">
                                            <option value="<?= $b->aktif ?>"><?= $peran ?></option>
                                            <hr>
                                            <option value="0">non-aktif</option>
                                            <option value="1">Aktif</option>
                                        </select>
                                        <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>No Handphone</label>
                                <input type="text" name="no_telepon" class="form-control shadow-sm rounded-lg p-3" value="<?= $b->no_telepon ?>" placeholder="Email">
                                <?= form_error('no_telepon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group text-right mt-2">
                                <a class="btn btn-danger" href="<?= base_url() ?>admin">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            <?php endforeach ?>
        </div>
    </div>
</div>
<script>
    // Menampilkan nama file yang dipilih di label
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("image").files[0].name;
        var label = document.querySelector('.custom-file-label');
        label.textContent = fileName;
    });
</script>