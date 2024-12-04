

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col col-lg-10 col-md-10 col-sm-10 col-10">

            <div class="card">
                <div class="card-body">
                    <?php
                    $grand_total = 0;
                    if($keranjang = $this->cart->contents()) {
                        foreach($keranjang as $item) {
                            $grand_total += $item['subtotal'];
                        }
                    ?>
                    <h3>Pilih alamat Pengiriman</h3>
                    <hr>
                    <div class="row justify-content-between">
                    <?php if(!empty($alamat->result())) {?>
                        <?php
                        $number = 1;
                        foreach ($alamat->result() as $a) : ?>
                            <div class="col col-lg-6 col-md-6 col-sm-12 col-12 mt-2">
                                <div class="card m-1 p-1">
                                    <div class=" card-header">
                                        <div class="row justify-content-between">
                                            <p><?= "Alamat ".$number ?></p>
                                            <div class="col col-lg-6 col-md-6 col-6 text-right">
                                                <?php echo anchor('dashboard/pembayaran/'.$a->id_alamat, '<div class="btn btn-sm btn-warning">Pilih</div>') ?>
                                            </div>                                   
                                        </div>                               
                                    </div>
                                    <div class="card-body">
                                        <p class=" card-text"><strong>Penerima : </strong> <?= $a->nama_penerima ?></p>
                                        <p class=" card-text"><?= $a->alamat ?> RT<?= $a->rt ?> RW<?= $a->rw ?> , Kode Pos : <?= $a->kodepos ?></p>
                                        <p class=" card-text"><?= $a->kota ?> , <?= $a->provinsi ?></p>
                                    </div>
                                </div> 
                            </div>
                            <?php $number++?>
                        <?php endforeach ?>
                    <?php } else { ?>
                        <p class="alert alert-danger m-1">Tidak ada alamat yang terdaftar</p>
                    <?php } ?>
                    <?php
                    } else {
                        echo "<h4>Keranjang Belanja anda masih Kosong</h4>";
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
