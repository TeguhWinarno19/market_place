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
        <div class="card-body text-center">
            <h4>Beranda Toko</h4>
            <?php if(!empty($beranda)) {?>
                <?php foreach ($beranda as $b) :?>
                    <hr>
                    <img src="<?php echo base_url('/assets/img/beranda/'.$b->gambar) ?>" class="card-img-top" alt="...">
                <?php endforeach ?>
            <?php } ?>
        </div>
    </div>
</div>