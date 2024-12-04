<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3>Pengajuan Klaim Dana</h3>
                    <hr>
                    <table class="table table-striped">
                        <tr>
                            <td>ID Order</td>
                            <td>Tanggal Transaksi</td>
                            <td>Total Transaksi</td>
                            <td>Status Klaim Dana</td>
                            <td>Aksi</td>
                        </tr>
                    <?php if(!empty($order)){?>
                        <?php foreach ($order as $o) :?>
                        <tr>
                            <td>
                                <a href="<?= base_url('admin/detail_pesanan/'.$o->id_order ) ?>"><?= $o->id_order ?></a>
                            </td>
                            <td><?= date('d F Y', $o->waktu); ?></td>
                            <td>Rp.<?= number_format($o->total_harga,0,',','.') ?></td>
                            <td>Diajukan Oleh toko</td>
                            <td>
                                <a class="btn btn-primary" href="<?= base_url('admin/bukti_transfer/'.$o->id_order) ?>">Kirim Bukti Transfer</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    <?php } ?>
                    </table>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h3>Histori Klaim</h3>
                    <hr>
                    <table class="table table-striped">
                        <tr>
                            <td>ID Order</td>
                            <td>Tanggal Transaksi</td>
                            <td>Total Transaksi</td>
                            <td>Status Klaim Dana</td>
                            <td>Aksi</td>
                        </tr>
                    <?php if(!empty($order1)){?>
                        <?php foreach ($order1 as $o) :?>
                        <tr>
                            <td>
                                <a href="<?= base_url('admin/detail_pesanan/'.$o->id_order ) ?>"><?= $o->id_order ?></a>
                            </td>
                            <td><?= date('d F Y', $o->waktu); ?></td>
                            <td>Rp.<?= number_format($o->total_harga,0,',','.') ?></td>
                            <td>
                                <p>Sudah di transfer</p>
                            </td>
                            <td>
                                <a class="btn btn-secondary" href="<?= base_url('admin/lihat_bukti/'.$o->id_klaim) ?>">Lihat Bukti Transfer</a>
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