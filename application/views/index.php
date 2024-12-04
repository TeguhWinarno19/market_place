<div class="container-fluid">
    <div id="carouselExampleControls" class="carousel slide mb-1" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?=  base_url()?>assets/img/slideA.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?=  base_url()?>assets/img/slideB.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?=  base_url()?>assets/img/slideC.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?=  base_url()?>assets/img/slideD.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <hr>
        <div class="row mt-1">
            <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="card mb-2 shadow-sm">
                    <div class="card-body">
                        <h5>Kategori Pilihan</h5>
                        <div class="row justify-content-center align-items-center mt-4">
                            <?php
                            $count = 1;
                            if(!empty($kategori)){ ?>
                                <?php foreach ($kategori as $ktg) : ?>
                                    <?php if(!empty($favorit)) {?>
                                        <?php foreach ($favorit as $fav) : ?>
                                            <?php if ($ktg->id_kategori ==$fav->id_kategori) {?>
                                                <?php if($count<6){?>
                                                <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 mt-2">
                                                    <div class="border-success align-items-center">                                       
                                                        <div class="text-center"> 
                                                            <a href="<?= base_url('dashboard/lihat_kategori/'.$ktg->id_kategori)  ?>" class="card-title  text-center">
                                                                <small>
                                                                <img src="<?php echo base_url('/assets/img/kategori/'.$ktg->gambar_kategori) ?>" class="img-fluid img-profile rounded-circle" alt="Hilang" style="width:100px;">
                                                                </small>
                                                            </a> 
                                                            <a href="<?= base_url('dashboard/lihat_kategori/'.$ktg->id_kategori)  ?>" class="card-title text-decoration-none text-black-50 text-center"><p><small><?php echo $ktg->kategori ?></small></p></a>                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $count++;?>
                                                <?php } ?>                                    
                                            <?php } ?>
                                        <?php endforeach ?>

                                    <?php } ?>
                                <?php endforeach ?>
                                <?php if ($count >= 6) { ?>
                                <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-4 col-6 mt-2">
                                    <div class="text-center">
                                        <a href="<?= base_url()?>dashboard/kategori_favorit" class="link"><i class="fas fa-arrow-circle-right fa-3x"></i></a>
                                    </div>
                                </div>
                                <?php } ?>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Barang Pilihan</h5>
                        <div class="row justify-content-center mt-4">
                            <?php $number=1; if(!empty($pilihan)){ ?>
                                <?php foreach ($pilihan as $p) : ?>
                                    <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-4 col-6 mt-2">
                                        <div class="card shadow-sm">
                                            <img class="card-img-top" src="<?php echo base_url('/assets/img/product/'.$p->gambar) ?>" alt="Card image cap">
                                            <div class="card-body">
                                                <h6>
                                                    <strong>
                                                        <?php 
                                                            $max_length = 15;
                                                            if(strlen($p->nama_barang) > $max_length) {
                                                                echo htmlspecialchars(substr($p->nama_barang, 0, $max_length) . '...');
                                                            } else {
                                                                echo htmlspecialchars($p->nama_barang);
                                                            }
                                                        ?>
                                                    </strong>
                                                </h6>
                                                <small>
                                                    <p>Disukai: <?= $p->wishlist_count; ?> orang</p>
                                                </small>
                                                <div class="d-grid gap-2 d-md-block text-center">
                                                    <a class="btn btn-block btn-success" href="<?= base_url('dashboard/detail_barang/'.$p->id_barang)?>">Lihat</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $number++ ?>
                                <?php endforeach;?>
                            <?php }
                            else{
                                echo "Produk Pilihan tidak Tersedia";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <hr>
    <div class="card mb-5">
        <div class="card-body">
            <h5>Produk</h5>
            <hr>
            <div class="row justify-content-left m-1">
                <?php 
                if(!empty($barang)){ ?>
                    <?php foreach ($barang as $b) : ?>
                        <div class="mt-2 mb-2 col col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
                            <div class="card shadow-sm mt-1">
                                <img class="card-img-top" src="<?php echo base_url('/assets/img/product/'.$b->gambar) ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h6>
                                        <?php 
                                            $max_length = 15;
                                            if(strlen($b->nama_barang) > $max_length) {
                                                echo htmlspecialchars(substr($b->nama_barang, 0, $max_length) . '...');
                                            } else {
                                                echo htmlspecialchars($b->nama_barang);
                                            }
                                        ?>
                                    </h6>
                                    <h6> <strong>Rp. <?= number_format($b->harga, 0, ',', '.'); ?></strong></h6>
                                    <div class="row mt-2 mb-2">
                                        <div class="col col-lg-2 col-md-2 col-sm-2 col-2">
                                            <img class="rounded-circle" style="width:25px;" src="<?php echo base_url('/assets/img/profile_toko/'.$b->logo_toko) ?>" alt="Card image cap">
                                        </div>
                                        <div class="col col-lg-10 col-md-10 col-sm-10 col-10 align-items-center">
                                            <small>
                                            <a href="<?= base_url('dashboard/detail_toko_beranda/'.$b->id_toko)?>" class=" text-success text-decoration-none card-text">
                                                <?php 
                                                    $max_length = 14;
                                                    if(strlen($b->nama_toko) > $max_length) {
                                                        echo htmlspecialchars(substr($b->nama_toko, 0, $max_length) . '...');
                                                    } else {
                                                        echo htmlspecialchars($b->nama_toko);
                                                    }
                                                ?>                            
                                            </a>
                                            </small>
                                        </div>
                                    </div>
                                    <h6><small>Terjual : <?= $b->terjual_count; ?></small></h6>
                                    <div class="d-grid gap-2 d-md-block text-center">
                                        <a class="btn btn-success btn-block" href="<?= base_url('dashboard/detail_barang/'.$b->id_barang)?>">Lihat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php } else {?>
                    <div class="container text-center">
                        <div class="row mt-3 mb-3 justify-content-center align-items-center">
                            <img class="img-profile rounded-circle" style="width: 150px;" src="<?= base_url() ?>assets/img/not_found.jpg" alt="">
                            <div class=" align-items-center">
                                <p>Oopss.. Produk Tidak Tersedia</p>
                                <p>Coba Gunakan kata kunci lain</p>
                            </div>
                        </div>
                    </div>
                <?php  } ?>
            </div>
        </div>
    </div>
</div>
