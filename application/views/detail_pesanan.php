<div class="container-fluid">
    <div class="container">
        <?php if(!empty($invoice)){?>
        <?php foreach($invoice as $inv):?>
        <div class="row">
            <div class="col-6">
                <h4><strong><?= $inv->status_pesanan ?></strong></h4>
            </div>
            <?php if($inv->status_pesanan == "Batal") {?>
            <div class="col-6 text-right">
                <a href="#" class="btn btn-success">Klaim Pembatalan</a>
            </div>
            <?php } else if ($inv->status_pesanan == "Tiba Tujuan"){ ?>
            <div class="col-6 text-right">
                <a href="<?= base_url('dashboard/selesaikan_pesanan/'.$inv->id_order) ?>" class="btn btn-success">Selesai</a>
            </div>
            <?php } ?>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="card mb-2">
                    <div class="card-body">
                        <h4><strong>Detail Pengiriman</strong></h4>
                        <hr>
                        <div class="row">
                            <div class="col-lg-3 col-4">
                                <h6>Alamat</h6>
                            </div>
                            <div class="col-lg-9 col-8">
                                <h6><strong><?= $inv->nama_penerima ?></strong></h6>
                                <p><?= $inv->alamat ?>, <?= $inv->rt ?>/<?= $inv->rw ?>,<?= $inv->kota ?>, <?= $inv->provinsi ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-4">
                                <h6>Resi</h6>
                            </div>
                            <div class="col-lg-9 col-8">
                                <p><?= $inv->resi ?></p>
                            </div>
                        </div>
                        <?php if ($inv->status_pesanan == "Tiba Tujuan" ||$inv->status_pesanan == "Selesai"){?>
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-4">
                                <h6> <?= $inv->status_pesanan ?></h6>
                            </div>
                            <div class="col-lg-9 col-8">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                 Lihat Bukti
                                </button>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <h4><strong>Rincian Pembayaran</strong></h4>
                        <hr>
                        <div class="row">
                            <div class="col-6">ID Invoice</div>
                            <div class="col-6 text-right"><?= $inv->id_transaksi ?></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">Harga Barang</div>
                            <div class="col-6 text-right">Rp. <?= number_format($inv->total_harga - 16000,0,'','.') ?></div>
                        </div>
                        <div class="row">
                            <div class="col-6">Ongkir</div>
                            <div class="col-6 text-right">Rp. <?= number_format(16000,0,',','.') ?></div>
                        </div>
                        <div class="row">
                            <div class="col-6">Total Harga</div>
                            <div class="col-6 text-right">Rp. <?= number_format($inv->total_harga,0,',','.') ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach ?>
        <?php } ?>
        <div class="card mb-2">
            <div class="card-body">
                <h4><strong>Detail Barang</strong></h4>
                <hr>
                <?php if(!empty($pesanan)){?>
                <?php foreach($pesanan as $p) :?>
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="row align-items-center" >
                                <div class="col-2">
                                    <img src="<?= base_url('assets/img/product/'.$p->gambar)?>" alt="" style="width: 8rem; border-radius: 20px;" class="img-fluid">
                                </div>
                                <div class="col-6">
                                    <h5><strong><?= $p->nama_barang ?></strong></h5>
                                    <h6><img src="<?= base_url('assets/img/profile_toko/'.$p->logo_toko) ?>" class="fas fa-fw" alt=""> <?= $p->nama_toko ?></h6>
                                </div>
                                <div class="col-4 text-right">
                                    <h6><strong><?= $p->qty ?> x Rp. <?= number_format($p->harga,0,'.','.') ?></strong></h6>
                                    <h6><strong>Rp.<?= number_format($p->qty*$p->harga,0,',','.') ?></strong></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-right">
                                <?php if($p->status_pesanan == "Tiba Tujuan"){?> 
                                    <a class="btn btn-danger" href="#">Komplain</a>
                                <?php } ?>
                                <?php if($p->status_pesanan == "Selesai" && $p->ulasan_lock == 0 ) {?>
                                    <a class="btn btn-success" href="<?= base_url('dashboard/ulasan_produk/'.$p->id_detail) ?>">Berikan Penilaian</a>
                                <?php } ?>
                                <?php if($p->ulasan_lock == 1){?>
                                    <div class="card mt-2">
                                        <div class="card-body">
                                        <?php $ulasan = $this->Model_order->review_barang($p->id_detail)->result(); ?>
                                        <?php if(!empty($ulasan)){?>
                                            <?php foreach($ulasan as $u):?>
                                                <h6> Oleh : <?= $u->nama_user ?>
                                                    <?php for ($i = 0; $i < $u->rating; $i++) : ?>
                                                        <i class="fas fa-star text-warning"></i>
                                                    <?php endfor; ?>
                                                </h6>
                                                <hr>
                                                <h6><?= $u->ulasan ?></h6>
                                            <?php endforeach ?>
                                        <?php }?>
                                        </div>
                                    </div>
                                <?php } ?>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bukti Pengiriman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
      <div class="modal-body">
        <?php foreach($invoice as $inv):?>
        <img src="<?= base_url('assets/img/bukti_pengiriman/'. $inv->image)?>" style="width:18rem;" alt="">
        <?php endforeach ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">tutup</button>
      </div>
    </div>
  </div>
</div>