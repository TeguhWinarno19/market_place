<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-lg-1 col-md-1 col-sm-2 col-3">
                    <img src="<?php echo base_url('/assets/img/profile_toko/'.$toko->logo_toko) ?>" style="width:10rem;" class="img-fluid img-profile rounded-circle" alt="Hilang">
                </div>
                <div class="col-lg-11 col-md-6 col-sm-6 col-8">
                    <h4><?= $toko->nama_toko ?></h4>
                    <h6><i class="fas fa-map-pin"></i> <?=$toko->kota ?></h6>
                    <h6 class="card-text"><small class="text-muted">Tedaftar Sejak <?= date('d F Y', $toko->waktu_daftar); ?></small></h6>
                </div>
            </div>
            <hr>
            <div class="row">
                <a href="<?= base_url('dashboard/detail_toko_beranda/'.$toko->id_toko) ?>" class="btn btn-link text-decoration-none text-black-50">Beranda</a>
                <a href="<?= base_url('dashboard/detail_toko_produk/'.$toko->id_toko) ?>" class="btn btn-link text-decoration-none text-black-50">Produk</a>
                <a href="<?= base_url('dashboard/detail_toko_ulasan/'.$toko->id_toko) ?>" class="btn btn-link text-decoration-none text-black-50">Ulasan</a>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <div class="row">
                <?php if(!empty($barang)) { ?>
                <?php foreach ($barang as $b) : ?>
                    <div class="col col-lg-2 col-md-3 col-sm-4 col-6">
                        <div class="card mt-1">
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
                                        <img class="rounded-circle fa-fw" src="<?php echo base_url('/assets/img/profile_toko/'.$toko->logo_toko) ?>" alt="Card image cap">
                                    </div>
                                    <div class="col col-lg-9 col-md-9 col-9">
                                        <small>
                                            <a href="<?= base_url('dashboard/detail_toko/'.$toko->id_toko)?>" class=" text-success text-decoration-none card-text">
                                            <?= $toko->nama_toko ?>     
                                            </a>
                                        </small>
                                    </div>
                                </div>
                                <div class="d-grid gap-2 d-md-block text-center mt-2">
                                    <a class="btn btn-primary" href="<?= base_url('dashboard/detail_barang/'.$b->id_barang)?>">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>