<div class="comtainer-fluid" style=" padding-top: 90px;">
        <h5 class="card-header">Whistlist Saya</h5>
            <div class="row justify-content-left m-1">
                <?php 
                if(!empty($whistlist)){ ?>
                    <?php foreach ($whistlist as $b) : ?>
                        <div class="mt-2 mb-2 col col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
                            <div class="card mt-1">
                                <img class="card-img-top" src="<?php echo base_url('/assets/img/product/'.$b->gambar) ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h6>
                                        <strong>
                                        <?php 
                                            $max_length = 15;
                                            if(strlen($b->nama_barang) > $max_length) {
                                                echo htmlspecialchars(substr($b->nama_barang, 0, $max_length) . '...');
                                            } else {
                                                echo htmlspecialchars($b->nama_barang);
                                            }
                                        ?>
                                        </strong>
                                    </h6>
                                    <small>Rp. <?= number_format($b->harga, 0, ',', '.'); ?></small>
                                    <div class="d-grid gap-2 d-md-block text-center mt-2">
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