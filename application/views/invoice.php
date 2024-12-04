<div class="comtainer-fluid" style=" padding-top: 90px;">
    <div class="card">
        <h5 class="card-header">Invoice Saya</h5>
        <div class="card-body">
            <?php 
            if(!empty($invoice)){ ?>
            <table class="table">
                <tr>
                    <th>ID Invoice</th>
                    <th>Penerima</th>
                    <th>Alamat</th>
                    <th>Waktu Pesanan</th>
                    <th>Detail</th>
                </tr>
            <?php foreach ($invoice as $i) : ?>
                <tr>
                    <td><?= $i->id_transaksi ?></td>
                    <td><?= $i->nama_penerima ?></td>
                    <td><?= $i->alamat." , ". $i->kota." , ". $i->provinsi ?></td>
                    <td><?= $i->tanggal_transaksi ?></td>
                    <td>
                        <a href="<?=base_url('dashboard/detail_invoice/'. $i->id_transaksi)?>" class="btn btn-success">
                            <i class=" fas fa-fw fa-search"></i> Lihat
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
            </table>
            <?php } else {?>
            <div class="container text-center">
                <div class="row mt-3 mb-3 justify-content-center align-items-center">
                    <img class="img-profile rounded-circle" style="width: 150px;" src="<?= base_url() ?>assets/img/not_found.jpg" alt="">
                    <div class=" align-items-center">
                        <p>Oopss.. Produk Tidak Tersedia</p>
                        <p>Coba Gunakan kata kunci lain</p>
                    </div>
                </div>
            </div>
            <?php  } ?>
        </div>
    </div>
</div>