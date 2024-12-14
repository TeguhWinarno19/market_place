<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3>Order List</h3>
                    <hr>
                    <table class="table table-bordered table-hover">
                        <tr>
                            <td>ID Order</td>
                            <td>Nama User</td>
                            <td>Kota Tujuan</td>
                            <td>Status Pesanan</td>
                            <td>Tanggal Transaksi</td>
                            <td>Total Transaksi</td>
                        </tr>
                    <?php if(!empty($order)){?>
                        <?php foreach ($order as $o) :?>
                        <tr>
                            <td>
                                <a href="<?= base_url('admin/detail_pesanan/'.$o->id_order ) ?>"><?= $o->id_order ?></a>
                            </td>
                            <td><?= $o->nama?></td>
                            <td><?= $o->kota?></td>
                            <td><?= $o->status_pesanan?></td>
                            <td><?= date('d F Y', $o->waktu); ?></td>
                            <td>Rp.<?= number_format($o->total_harga,0,',','.') ?></td>
                        </tr>
                        <?php endforeach ?>
                    <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>