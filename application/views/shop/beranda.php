<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-lg-1 col-md-1 col-sm-2 col-3">
                    <img src="<?php echo base_url('/assets/img/profile_toko/'.$toko->logo_toko) ?>" style="width:10rem;" class="img-fluid img-profile rounded-circle" alt="Hilang">
                </div>
                <div class="col-lg-11 col-md-6 col-sm-6 col-8">
                    <h4><?= $toko->nama_toko ?></h4>
                    <h6><i class="fas fa-map-pin"></i> <?=$toko->kota ?></h6>
                    <h6 class="card-text"><small class="text-muted">Tedaftar Sejak <?= date('d F Y', $toko->waktu_daftar); ?></small></h6>
                </div>
            </div>
            <hr>
            <div class="row">
                <a href="<?= base_url('shop/beranda/'.$toko->id_toko) ?>" class="btn btn-link text-decoration-none text-black-50">Beranda</a>
                <a href="<?= base_url('shop/detail_toko_produk/'.$toko->id_toko) ?>" class="btn btn-link text-decoration-none text-black-50">Produk</a>
                <a href="<?= base_url('shop/beranda/'.$toko->id_toko) ?>" class="btn btn-link text-decoration-none text-black-50">Ulasan</a>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <a href="#" class="btn btn-primary mb-2"data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah Gambar</a>
            <?php foreach ($beranda as $b) :?>
                <hr>
                <img src="<?php echo base_url('/assets/img/beranda/'.$b->gambar) ?>" class="card-img-top" alt="...">
                <a class="btn btn-danger mt-2" href="<?= base_url('shop/hapus_item_beranda/'.$b->gambar) ?>"> <i class="fas fa-arrow-up"></i>Hapus Gambar</a>
            <?php endforeach ?>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Input Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form action="<?php echo base_url(). 'shop/tambah_gambar'; ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Gambar Produk</label><br>
                    <input type="file" name="gambar" class="form-control p-1">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>