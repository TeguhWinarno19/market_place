<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-10">
            <h4>Pesanan</h4>
            <hr>
            <?php if (!empty($pesanan)) { ?>
                <?php foreach ($pesanan as $p) : ?>
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-8">
                                    <div class="row">
                                        <div class="col-lg-1 col-3">
                                            <i class="fas fa-2x fa-shopping-bag"></i>
                                        </div>
                                        <div class="col-lg-8 col-9">
                                            <h6><strong>Belanja</strong></h6>
                                            <p><?= date('d F Y', $p->waktu); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-4 text-right">
                                   <h6 class=" text-success"><?= $p->status_pesanan ?></h6>
                                </div>
                            </div>
                            <hr>
                            <?php $detail_pesanan = $this->Model_order->pesanan_detail($p->id_order)->result(); ?>
                            <?php  $no = 0;?>
                            <?php  $total_belanja = 0;?>
                            <?php foreach ($detail_pesanan as $d) : ?>
                                <?php if($no == 0){?>
                                    <div class="row justify-content-between">
                                        <div class="col-lg-3 col-5">
                                            <img src="<?= base_url('assets/img/product/'. $d->gambar) ?>" style="width: 7rem; border-radius: 20px;" alt="">
                                        </div>
                                        <div class="col-7">
                                            <h6><strong><?= $d->nama_barang ?></strong></h6>
                                            <p><?= $d->qty ?> Barang</p>
                                            <a class="btn btn-success" href="<?= base_url('dashboard/detail_pesanan/'. $p->id_order)?>">Lihat Pesanan</a>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php $no++; ?>
                                <?php $total_belanja = $total_belanja + ($d->qty * $d->harga) ?>
                            <?php endforeach; ?>
                            <?php if ($no > 1){?>
                                <p class="mt-3">+<?= $no-1 ?>barang lainnya</p>
                            <?php }?>
                            <h6 class="mt-2">Total Belanja</h6>
                            <h6><strong>Rp. <?= $total_belanja + 16000 ?></strong></h6>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php } ?>
        </div>
    </div>
</div>
