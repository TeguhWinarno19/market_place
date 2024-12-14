<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Aprilpedia | Market Place</title>

        <!-- Custom fonts for this template-->
        <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
        <style>
        .container-fluid {
            padding-top: 100px; /* Menambahkan padding agar konten tidak tertutup navbar */
        }
        </style>
        
        <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-jX5DY-i8VkPwSromjRhHEq6K"></script>
    </head>
    <body>
        <div class="wrapper">
            <div id="content-wrapper" class="d-flex flex-column">
                <div class="container-fluid">
                    <div class="container">
                        <div class="card mb-5">
                            <div class="card-body">
                                <?php if(!empty($invoice)){?>
                                    <?php foreach($invoice as $i) :?>
                                        <div class="row">
                                            <img src="<?= base_url()?>assets/img/Logokita.jpeg" alt="" style="width:12rem;">
                                            <div class="">
                                                <h5>Invoice <?= $i->id_transaksi ?></h5>
                                                <h6>Penerima: <?= $i->nama_penerima?></h6>
                                                <h6><?= $i->alamat.", RT:". $i->rt.", RW:". $i->rw.", Kodepos:". $i->kodepos?></h6>
                                                <h6><?= $i->kota.', '.$i->provinsi?></h6>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                <?php } ?>
                                <hr>
                                <h6><strong>Detail Produk</strong></h6>
                                <?php
                                $cart_by_toko = [];
                                foreach ($pesanan as $item) {
                                    $cart_by_toko[$item->id_toko][] = $item;        
                                } 
                                ?>
                                <?php
                                foreach ($cart_by_toko as $id_toko => $items) { ?>
                                <div class="card mt-2">
                                    <div class="card-body">
                                        <?php $toko = $this->Model_toko->toko_by_id($id_toko); ?>
                                        <div class=" text-left">
                                            <h6><img src="<?=base_url()?>assets/img/profile_toko/default.jpg" alt="Shop" class="rounded-circle fa-fw"><?= $toko->nama_toko ?></h6>
                                        </div>  
                                        <?php foreach ($items as $item) { ?>
                                            <hr>
                                            <div class="row mt-3 mb-2">
                                                <div class="col-2">
                                                    <img src="<?php echo base_url('/assets/img/product/'.$item->gambar) ?>" alt="<?php echo $item->gambar; ?>" style="width: 5rem; border-radius: 20px;" class="img-fluid">
                                                </div>
                                                <div class="col-6">
                                                    <p><?= $item->nama_barang ?></p>
                                                </div>
                                                <div class="col-4">
                                                    <p class="text-right">
                                                        <strong>
                                                            <?php echo $item->jumlah; ?> x Rp. <?= number_format($item->harga, 0, ',', '.'); ?>
                                                        </strong>
                                                    </p>
                                                    <p class=" text-right">
                                                        <strong>
                                                            Rp. <?= number_format($item->jumlah * $item->harga, 0, ',','.'); ?>
                                                        </strong>
                                                    </p>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="card mt-2">
                                            <div class="card-body">
                                                <h6><strong>Detail Pengiriman</strong></h6>
                                                <?php if(!empty($invoice)){?>
                                                <?php foreach($invoice as $i) :?>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12"><p>Alamat</p></div>
                                                        <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                                            <p><strong><?= $i->nama_penerima ?></strong></p>
                                                            <p><?= $i->alamat.", RT : ". $i->rt. ", RW : ". $i->rw . ", Kodepos : ". $i->kodepos ?></p>
                                                            <p><?= $i->kota.", ".$i->provinsi ?></p>
                                                        </div>
                                                    </div>
                                                <?php endforeach?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="card mt-2">
                                            <div class="card-body">
                                                <h6><strong>Rincian Pembayaran</strong></h6>
                                                <hr>
                                                <?php if(!empty($invoice)){?>
                                                <?php foreach($invoice as $i) :?>
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-12 col-sm-12 col-8">Subtotal Harga Barang</div>
                                                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 text-right">
                                                        <p>Rp.<?= number_format($i->total_harga_barang , 0, ',', '.') ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-12 col-sm-12 col-8">Biaya Ongkir</div>
                                                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 text-right">
                                                        <p>Rp.<?= number_format($i->ongkir , 0, ',', '.') ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-12 col-sm-12 col-8">Asuransi</div>
                                                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 text-right">
                                                        <p>Rp.<?= number_format($i->asuransi , 0, ',', '.')?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-12 col-sm-12 col-8">Biaya Aplikasi</div>
                                                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 text-right">
                                                        <p>Rp.<?= number_format($i->biaya_aplikasi, 0, ',', '.') ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-12 col-sm-12 col-8">Pajak 12%</div>
                                                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 text-right">
                                                        <p>Rp.<?= number_format($i->pajak, 0, ',', '.') ?></p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-12 col-sm-12 col-8">Total Belanja</div>
                                                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 text-right">
                                                        <p>Rp.<?= number_format($i->total_belanja, 0, ',', '.') ?></p>
                                                    </div>
                                                </div>
                                                <?php endforeach?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
                <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                <!-- Core plugin JavaScript-->
                <script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>

                <!-- Page level plugins -->
                <script src="<?= base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="<?= base_url() ?>assets/js/demo/chart-area-demo.js"></script>
                <script src="<?= base_url() ?>assets/js/demo/chart-pie-demo.js"></script>
                <script type="text/javascript">
                    window.print(); 
                </script>
            </div>
        </div>
    </body>
</html>