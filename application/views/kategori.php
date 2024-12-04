<div class="container-fluid">
    <?php if(!empty($kategori)) {?>
        <?php foreach ($kategori as $k) :?>
            <?php if ($k->id_kategori == $judul_kategori){?>
                <h3>Kategori yang dicari "<?= $k->kategori ?>"</h3>
            <?php } ?>
        <?php endforeach ?>
    <?php } ?>
    <hr>
    <div class="card">
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
                        <small>Rp. <?= number_format($b->harga, 0, ',', '.'); ?></small>
                        <div class="row mt-2 mb-2">
                            <div class="col col-lg-1 col-md-1 col-1">
                                <img class="rounded-circle fa-fw" src="<?php echo base_url('/assets/img/profile_toko/'.$b->logo_toko) ?>" alt="Card image cap">
                            </div>
                            <div class="col col-lg-9 col-md-9 col-9">
                                <small>
                                    <a href="<?= base_url('dashboard/detail_toko/'.$b->id_toko)?>" class=" text-success text-decoration-none card-text">
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
                        <div class="d-grid gap-2 d-md-block text-center">
                            <a class="btn btn-block btn-success btn-user" href="<?= base_url('dashboard/detail_barang/'.$b->id_barang)?>">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
            <?php } else {?>
                <div class="container text-center">
                    <div class="row mt-3 mb-3 justify-content-center align-items-center">
                        <img class="img-profile rounded-circle" style="width: 150px;" src="<?= base_url() ?>assets/img/not_found.jpg" alt="">
                        <div class=" ml-3 mt-3 align-items-center">
                            <h5>Oopss.. Produk Tidak Tersedia</h5>
                            <h5>Coba Gunakan kata kunci lain</h5>
                        </div>
                    </div>
                </div>
            <?php  } ?>
        </div>
    </div>
</div>
