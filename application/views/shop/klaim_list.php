<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card">
                <div class="card-body">
                    <h3>Pengajuan Klaim Dana</h3>
                    <hr>
                    <table class="table">
                        <tr>
                            <td>ID Order</td>
                            <td>Tanggal Transaksi</td>
                            <td>Total Transaksi</td>
                            <td>Aksi</td>
                        </tr>
                    <?php if(!empty($order)){?>
                        <?php foreach ($order as $o) :?>
                        <tr>
                            <td><?= $o->id_order ?></td>
                            <td><?= date('d F Y', $o->waktu); ?></td>
                            <td>Rp.<?= number_format($o->total_harga,0,',','.') ?></td>
                            <td>
                                <?php if($o->id_klaim == ""){?>
                                <a class="btn btn-primary" href="<?= base_url('shop/ajukan_klaim/'.$o->id_order) ?>">Ajukan klaim</a>
                                <?php } else if($o->id_klaim != "") {?>
                                <a class="btn btn-secondary" href="<?= base_url('shop/ajukan_klaim/'.$o->id_order) ?>">Sudah Ajukan Klaim</a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>