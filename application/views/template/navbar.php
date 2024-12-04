<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow fixed-top ">
    <a class="navbar-brand text-success" href="<?= base_url()?>Dashboard/">Aprilpedia</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown align-items-center">
                <!-- Button trigger modal -->
                <a type="button" class=" navbar-text text-secondary mr-2" data-toggle="modal" data-target="#kategori">
                    Kategori
                </a>
            </li>
            <form class="form-inline my-2 my-lg-0 navbar-search d-none d-sm-flex ml-auto" action="<?php echo base_url(). 'dashboard/cari_barang'; ?>" method="post">
                <div class="input-group w-75">
                    <input type="text" class="form-control bg-light border-1 small"
                        placeholder="Search for..." aria-label="Search" name="search"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                            placeholder="Search for..." aria-label="Search"
                            aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
            
            <?php
            if(empty($user['nama'])){
            ?>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item my-auto">
                <a class="btn btn-success" href="<?= base_url()?>auth">Masuk</a>
            </li>
            <?php
            }
            else{
            ?>
            <li class="nav-item d-none d-sm-flex ml-auto">
                <?php
                $isi = $this->cart->total_items();
                $keranjang = '<i class="fas fa-fw fa-shopping-cart position-relative"><span class="badge badge-danger badge-counter position-absolute top-0 start-100 translate-right" style="top: 1px; right: -10px;">'.$isi.'</span></i>';
                ?>
                <?php echo anchor('dashboard/detail_keranjang', $keranjang, array('class' => 'nav-link')) ?>
            </li>
            <!-- Tampilkan Cart dalam Dropdown di layar kecil -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="cartDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-shopping-cart fa-fw"></i>
                    <span class="badge badge-danger badge-counter"><?= $isi ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="cartDropdown">
                    <a class="dropdown-item" href="<?= base_url('dashboard/detail_keranjang'); ?>">Lihat Keranjang</a>
                </div>
            </li>
            <!-- Nav Item - Alerts -->
            
            <!-- Messages untuk layar besar -->
            <li class="nav-item dropdown no-arrow mx-1 d-none d-sm-flex">
                <a class="nav-link dropdown-toggle" href="<?= base_url('chatting') ?>" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-envelope fa-fw"></i>
                    <span class="badge badge-danger badge-counter"><?= $notifikasi ?></span>
                </a>
            </li>
            <!-- Messages untuk layar kecil -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdownMobile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-envelope fa-fw"></i>
                    <span class="badge badge-danger badge-counter"><?= $notifikasi ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="messagesDropdownMobile">
                    <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama'] ?></span>
                    <img class="img-profile rounded-circle" src="<?= base_url();?>assets/img/profile/default.jpg">
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?= base_url()?>dashboard/user">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <a class="dropdown-item" href="<?= base_url('dashboard/whistlist_user/'.$user['id_user'])?>">
                        <i class="fas fa-heart fa-sm fa-fw mr-2 text-gray-400"></i>
                        Whistlist
                    </a>
                    <a class="dropdown-item" href="<?= base_url('dashboard/invoice_user/'.$user['id_user'])?>">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Invoice
                    </a>
                    <a class="dropdown-item" href="<?= base_url('dashboard/pesanan_user/'.$user['id_user'])?>">
                        <i class="fas fa-box fa-sm fa-fw mr-2 text-gray-400"></i>
                        Pesanan Saya
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>
            <?php                
            }
            ?>
        </ul>
    </div>
</nav>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">Logout to end this session</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body justify-content-between">
                <?php if (!empty($kategori)) { ?>
                    <?php foreach ($kategori as $ktg) : ?>
                        <a class="btn btn-light" href="<?= base_url('dashboard/lihat_kategori/'.$ktg->id_kategori)  ?>">
                            <img src="<?php echo base_url('/assets/img/kategori/'.$ktg->gambar_kategori) ?>" class="img-fluid img-profile rounded-circle fa-fw" alt="Hilang">
                            <?= $ktg->kategori ?>
                        </a>
                    <?php endforeach;?>
                <?php } else{ ?>
                    <p>Tidak ada Kategori yang tersedia</p>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>