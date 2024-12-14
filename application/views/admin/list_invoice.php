<div class="container-fluid">
    <div class="card">
        <h5 class="card-header">Invoice Saya</h5>
        <div class="card-body">
            <?php 
            if(!empty($invoice)){ ?>
            <table class="table table-bordered table-hover table-responsive-lg">
                <thead class="thead-dark">                
                    <tr>
                        <th>ID Invoice</th>
                        <th>Penerima</th>
                        <th>Alamat</th>
                        <th>Waktu Pesanan</th>
                    </tr>
                </thead>
            <?php foreach ($invoice as $i) : ?>
                <tbody>
                <tr>
                    <td>
                        <a href="<?=base_url('admin/detail_invoice/'. $i->id_transaksi)?>">
                            <?= $i->id_transaksi ?>
                        </a>
                    </td>
                    <td><?= $i->nama_penerima ?></td>
                    <td><?= $i->alamat." , ". $i->kota." , ". $i->provinsi ?></td>
                    <td><?= $i->tanggal_transaksi ?></td>
                </tr>
                </tbody>
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