<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-lg-1 col-md-1 col-sm-2 col-3">
                    <img src="<?php echo base_url('/assets/img/profile_toko/'.$toko->logo_toko) ?>" style="width:10rem;" class="img-fluid img-profile rounded-circle" alt="Hilang">
                </div>
                <div class="col-lg-11 col-md-6 col-sm-6 col-8">
                    <h4>
                        <?= $toko->nama_toko ?> | <i class="fas fa-star text-warning"></i>  (<?= $overall ?>)
                    </h4>
                    <h6><i class="fas fa-map-pin"></i> <?=$toko->kota ?></h6>
                    <h6 class="card-text"><small class="text-muted">Tedaftar Sejak <?= date('d F Y', $toko->waktu_daftar); ?></small></h6>
                </div>
            </div>
            <hr>
            <div class="row">
                <a href="<?= base_url('shop/beranda/'.$toko->id_toko) ?>" class="btn btn-link text-decoration-none text-black-50">Beranda</a>
                <a href="<?= base_url('shop/detail_toko_produk/'.$toko->id_toko) ?>" class="btn btn-link text-decoration-none text-black-50">Produk</a>
                <a href="<?= base_url('shop/detail_toko_ulasan/'.$toko->id_toko) ?>" class="btn btn-link text-decoration-none text-black-50">Ulasan</a>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <h4><strong>Ulasan Produk anda</strong></h4>
            <hr>
            <?php if(!empty($ulasan)) {?>
            <?php foreach($ulasan as $u) : ?>
            <div class="card mb-2">
                <div class="card-body">
                    <div class="row">
                        <h6><strong><?= $u->nama_user ?></strong> | (<?= $u->rating ?>)</h6>
                        <?php for ($i = 0; $i < $u->rating; $i++) : ?>
                            <i class="fas fa-star text-warning"></i>
                        <?php endfor; ?>
                    </div>
                    <hr>
                    <div class="row">
                        <img src="<?= base_url('assets/img/product/'.$u->gambar) ?>" class="img-top" style="width:75px;" alt="">
                        <div class="col-5">
                            <h6><strong><?= $u->nama_barang ?></strong></h6>
                            <p>Rp. <?= number_format($u->harga, 0, ',', '.'); ?></p>
                        </div>
                    </div>
                    <hr>
                    <p><?= $u->ulasan ?></p>
                </div>
            </div>
            <?php endforeach ?>
            <?php } ?>
        </div>
    </div>
</div>