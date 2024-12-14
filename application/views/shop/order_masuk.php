<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4><strong>Orderan Masuk</strong></h4>
                    <hr>
                    <div class="table-responsive">
                        <?php if(!empty($order)){?>
                        <table class="table table-striped">
                            <tr>
                                <th>ID order</th>
                                <th>Costumer</th>
                                <th>Tanggal Order</th>
                                <th>Status Pemesanan</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                        <?php foreach ($order as $o):?>
                            <tr>
                                <td><a class=" text-primary text-decoration-none" href="<?= base_url('shop/detail_pesanan/'.$o->id_order)?>"><?= $o->id_order ?></a></td>
                                <td><?= $o->nama ?></td>
                                <td><?= date('d F Y', $o->waktu); ?></td>
                                <td><?= $o->status_pesanan ?></td>
                                <td>
                                    <?php if ($o->status_pesanan == "Menunggu Konfirmasi"){?>
                                    <a href="<?= base_url('shop/konfirmasi_pesanan/'.$o->id_order) ?>" class="btn btn-primary">
                                        <i class="fas fa-check"></i> Konfirmasi
                                    </a>
                                    <?php } else if ($o->status_pesanan == "Diproses"){?>
                                    <a href="<?= base_url('shop/input_resi/'.$o->id_order) ?>" class="btn btn-primary">
                                        <i class="fas fa-shipping-fast"></i> Input Resi
                                    </a>
                                    <?php } else if ($o->status_pesanan == "Dikirim"){?>
                                    <a href="<?= base_url('shop/pesanan_sampai/'.$o->id_order) ?>" class="btn btn-primary">
                                        <i class="fas fa-check"></i> Barang Sampai
                                    </a>
                                    <?php } ?>
                                    <a href="<?= base_url('shop/detail_pesanan/'.$o->id_order)?>" class="btn btn-success">
                                        <i class="fas fa-search"></i>Lihat
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>