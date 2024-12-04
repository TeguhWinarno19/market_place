<style>
  .container-fluid {
    padding-top: 100px; /* Menambahkan padding agar konten tidak tertutup navbar */
  }
</style>
<style>
        body {
            background-color: #f8f9fa;
        }
        .profile-card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .profile-header {
            color: white;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            padding: 20px;
        }
        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 5px solid white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .social-icons a {
            color: #007bff;
            font-size: 1.5rem;
            margin: 0 10px;
        }
        .shop-card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>

<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col col-lg-12 mb-4">
            <div class="row">
                <div class="col col-lg-6 col-12 mb-2">
                    <div class="card profile-card">
                        <div class="profile-header text-center bg-success">
                            <img src="<?= base_url("assets/img/profile/") . $user['image'] ?>" class="img-thumbnail" style="width: 7rem;">
                            <h3><?= $user['nama'] ?></h3>
                            <div>
                                <?php if(!empty($toko)) { ?>
                                    <a class="btn btn-warning" href="<?= base_url()?>shop">
                                        <img src="<?=base_url()?>assets/img/profile_toko/default.jpg" alt="Shop" class="rounded-circle fa-fw">
                                        <?= $toko->nama_toko ?>
                                    </a>
                                <?php } else { ?>
                                    <p>Tidak Ada Toko Terdaftar</p>
                                    <a class="btn btn-warning" href="<?= base_url() ?>dashboard/daftar">Daftar Toko</a>
                                <?php } ?>
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
                            <h5>Setting Akun</h5>
                            <hr>
                            <div class="row">
                                <div class="col col-lg-6 col-md-6">
                                    <a class="btn btn-primary" href="<?= base_url()?>user_set/edit">Edit Profile</a>
                                    <a class="btn btn-danger" href="<?= base_url()?>user_set/changepassword">Ubah Password</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-6 col-12">
                    <div class="card">
                        <h5 class=" card-header bg-success">Alamat <a class="btn btn-outline-secondary btn-sm" href="<?=base_url()?>dashboard/tambah_alamat"><i class="fas fa-fw fa-plus"></i></a></h5>
                        <?php if(!empty($alamat->result())) {?>
                            <?php
                            $number = 1;
                            foreach ($alamat->result() as $a) : ?>
                                <div class="card m-1 p-1">
                                    <div class=" card-header">
                                        <div class="row justify-content-between">
                                            <p><?= "Alamat ".$number ?></p>
                                            <div class="col col-lg-6 col-md-6 col-6 text-right">
                                                <?php echo anchor('dashboard/edit_alamat/'.$a->id_alamat, '<div class="btn btn-sm btn-primary">Edit</div>') ?>
                                                <?php echo anchor('dashboard/hapus_alamat/'.$a->id_alamat, '<div class="btn btn-sm btn-danger">Hapus</div>') ?>
                                            </div>                                   
                                        </div>                               
                                    </div>
                                    <div class="card-body">
                                        <p class=" card-text"><strong>Penerima : </strong> <?= $a->nama_penerima ?></p>
                                        <p class=" card-text"><?= $a->alamat ?> RT<?= $a->rt ?> RW<?= $a->rw ?> , Kode Pos : <?= $a->kodepos ?></p>
                                        <p class=" card-text"><?= $a->kota ?> , <?= $a->provinsi ?></p>
                                    </div>
                                </div>
                                <?php $number++?>
                            <?php endforeach ?>
                        <?php } else { ?>
                            <p class="alert alert-danger m-1">Tidak ada alamat yang terdaftar</p>
                        <?php } ?>
                    </div>  
                </div>    
            </div>   
        </div>    
    </div>
</div>