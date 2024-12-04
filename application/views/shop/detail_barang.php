<div class="container-fluid">
    <h3>Detail Barang</h3>
    <hr>
    <?php foreach ($barang as $b) : ?>
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-left">
                <div class="col col-lg-4 col-md-6 col-sm-12 col-12 mt-5 text-center">
                    <img class="card-img-top align-items-center" style="width: 15rem; border-radius: 20px;" src="<?php echo base_url('/assets/img/product/'.$b->gambar) ?>" alt="Card image cap">
                </div>
                <div class="col col-lg-8 col-md-6 col-sm-12 col-12 mt-5">
                    <div class="container">
                        <h3>
                            <strong>
                                <?= $b->nama_barang ?>
                            </strong>
                        </h3>
                        <h2>
                            Rp. <?= number_format($b->harga, 0, ',', '.'); ?>
                        </h2>
                        <hr>
                        <p>Kondisi : <?= $b->kondisi ?></p>
                        
                        <p>Kategori :
                            <a class=" text-decoration-none text-success" href="<?php echo base_url('dashboard/lihat_kategori/'.$b->id_kategori)?>">
                                <strong><?= $b->kategori ?></strong>
                            </a>
                        </p>
                        <p>
                            <strong>Keterangan</strong>
                        </p>
                        <p><?= $b->keterangan ?></p>
                    </div>
                    <hr>
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col col-lg-3 text-right">
                                <img class="rounded-circle" style="width:60px" src="<?php echo base_url('/assets/img/profile_toko/'.$b->logo_toko) ?>" alt="Card image cap">
                            </div>
                            <div class="col col-lg-9">
                                <a class="text-decoration-none text-black-50" href="<?php echo base_url('dashboard/profile_toko/'.$b->id_toko)?>">
                                    <i class=" fas fa-fw fa-store"></i> <?= $b->nama_toko ?>
                                </a>
                                <br>
                                <a class="mt-2 text-decoration-none text-black-50" href="#"><i class="fas fa-fw fa-map-marker"></i><?= $b->kota ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach ?>
    <hr>
</div>
