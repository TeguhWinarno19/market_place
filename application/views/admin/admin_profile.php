<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col col-lg-12 mb-4">
            <div class="row justify-content-center">
                <div class="col col-lg-6 col-12 mb-2">
                    <div class="card">
                        <div class="card-header bg-info">
                            <div class="row">
                                <div class="col-3">
                                    <img src="<?= base_url("assets/img/profile/") . $user['image'] ?>" class="img-thumbnail">
                                </div>
                                <div class="col-9">
                                    <h3><?= $user['nama'] ?></h3>
                                    <hr>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <a class="btn btn-primary m-1" href="<?= base_url('admin/edit_user/'.$user['id_user'])?>">Edit Profile</a>
                                <a class="btn btn-danger m-1" href="<?= base_url()?>admin/changepassword">Ubah Password</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Information</h5>
                            <hr>
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <p><strong><i class="fas fa-envelope mr-2"></i>Email:</strong> <?= $user['email']?></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><strong><i class="fas fa-phone mr-2"></i>Phone:</strong> <?= $user['no_telepon']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div>    
    </div>
</div>