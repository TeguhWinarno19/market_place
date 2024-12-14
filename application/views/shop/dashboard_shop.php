<div class="container-fluid">
    <div class="row justify-content-between">
        <h3>Dashboard Toko Anda</h3>
        <a class="btn btn-danger" href="<?= base_url('shop/edit/'.$toko_id)?>"><strong><i class="fas fa-fw fa-cogs"></i> Edit Toko</strong></a>
    </div>
    <hr>
    <div class="row justify-content-between">
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
            <div class="card border-left-primary">
                <div class="card-body">
                    <h5><strong><i class="fas fa-boxes"></i> Total Barang</strong></h5>
                    <hr>
                    <h6><strong><?= $barang_count_data ?> Barang</strong></h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
            <div class="card border-left-info">
                <div class="card-body">
                    <h5><strong>Barang Terjual</strong></h5>
                    <hr>
                    <h6><strong><?= $barang_sell_value ?> Barang</strong></h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
            <div class="card border-left-success">
                <div class="card-body">
                    <h5><strong>Pendapatan</strong></h5>
                    <hr>
                    <h6><strong>Rp. <?= number_format($pendapatan_toko_value, 0, ',', '.'); ?></strong></h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
            <div class="card border-left-warning">
                <div class="card-body">
                    <h5><strong>Order Unconfirm</strong></h5>
                    <hr>
                    <h6><strong><?= $menunggu_value ?> Pesanan</strong></h6>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
            <div class="card mb-2">
                <h5 class="card-header"><strong>Barang Toko Anda</strong></h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Stok</th>
                                    <th>Terjual</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($barang_toko)) {?>
                                <?php foreach($barang_toko as $bt) :?>
                                <tr>
                                    <td><a class="text-decoration-none" href="<?= base_url('shop/detail_barang/'.$bt->id_barang) ?>"><?= $bt->nama_barang ?></a></td>
                                    <td><?= $bt->stok ?></td>
                                    <?php $terjual = 0; ?>
                                    <?php $terjual_array = $this->Model_order->barang_terjual_barang($bt->id_barang)->result(); ?>
                                    <?php if(!empty($terjual_array)) {?>
                                        <?php foreach($terjual_array as $t):?>
                                            <?php $terjual = $terjual + $t->qty ?>
                                        <?php endforeach ?>
                                    <?php } ?>
                                    <td><?= $terjual ?></td>
                                </tr>
                                <?php endforeach; ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header"><strong>Barang akan Habis</strong></h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($barang_kritis)) {?>
                                <?php foreach($barang_kritis as $b) :?>
                                <tr>
                                    <td><a class="text-decoration-none" href="<?= base_url('shop/detail_barang/'.$b->id_barang) ?>"><?= $b->nama_barang ?></a></td>
                                    <td><?= $b->stok ?></td>
                                </tr>
                                <?php endforeach; ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <a href="<?= base_url('shop/cetak_barang_habis/'.$toko_id); ?>" class="btn btn-primary"><i class="fas fa-fw fa-print"></i>Cetak</a>
                    <a href="<?= base_url('shop/export_barang_habis/'.$toko_id); ?>" class="btn btn-success"><i class="fas fa-fw fa-file-excel"></i>Eksport Excell</a>
                </div>
            </div>
        </div>
    </div>
</div>