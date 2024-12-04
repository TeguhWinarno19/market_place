<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card">
                <div class="card-body">
                    <h3>Klaim dan pencairan</h3>
                    <hr>
                    <table class="table">
                        <tr>
                            <td>ID Order</td>
                            <td>Tanggal Transaksi</td>
                            <td>Total Transaksi</td>
                            <td>keterangan</td>
                            <td>Aksi</td>
                        </tr>
                    <?php if(!empty($order1)){?>
                        <?php foreach ($order1 as $o) :?>
                        <tr>
                            <td><?= $o->id_order ?></td>
                            <td><?= date('d F Y', $o->waktu); ?></td>
                            <td>Rp.<?= number_format($o->total_harga,0,',','.') ?></td>
                            <td>
                                <?= $o->status ?>
                            </td>
                            <td>
                                <?php if($o->status == 'disetujui'){?>
                                <a href="<?= base_url('shop/bukti_transfer/'.$o->id_klaim) ?>" class="btn btn-primary">Lihat Bukti</a>
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