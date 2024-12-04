<div class="container-fluid">
    <h3>Produk Pilihan</h3>
    <hr>
    <div class="container-fluid mb-3">
        <div class="row">    
            <?php $number=1; if(!empty($pilihan)){ ?>
                <?php foreach ($pilihan as $p) : ?>
                    <div class="col col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="card m-2">
                            <img class="card-img-top" src="<?php echo base_url('/assets/img/product/'.$p->gambar) ?>" alt="Card image cap">
                            <div class="card-body">
                                <h6>
                                    <strong>
                                        <?= $p->nama_barang ?>
                                    </strong>
                                </h6>
                                <div class="d-grid gap-2 d-md-block">
                                    <a class="btn btn-outline-danger" href="<?= base_url('admin/hapus_pilihan/'.$p->id_barang)?>"><i class="fas fa-fw fa-star"></i>Hapus Pilihan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $number++ ?>
                <?php endforeach;?>
            <?php }
            else{
                echo "Produk Pilihan tidak Tersedia";
            }
            ?>
        </div>
    </div>
    <h3>Semua Produk</h3>
    <hr>

    <div class="container-fluid">
        <div class="row">
            <?php
            if(!empty($barang)){ ?>
            <?php foreach ($barang as $b) : ?>
                <!-- <div class="col-lg-1 col-md-1 col-sm-2"> -->
                <div class="col col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="card m-2">
                            <img class="card-img-top" src="<?php echo base_url('/assets/img/product/'.$b->gambar) ?>" alt="Card image cap">
                            <div class="card-body">
                                <h6>
                                    <strong>
                                    <?=
                                    $b->nama_barang
                                    ?>
                                    </strong>
                                </h6>
                                <small>Rp. <?= number_format($b->harga, 0, ',', '.'); ?></small>
                                <div class="row mt-2 mb-2">
                                    <div class="col col-lg-1 col-md-1 col-1">
                                        <img class="rounded-circle fa-fw" src="<?php echo base_url('/assets/img/profile_toko/'.$b->logo_toko) ?>" alt="Card image cap">
                                    </div>
                                    <div class="col col-lg-9 col-md-9 col-9">
                                        <a href="<?= base_url('dashboard/detail_toko/'.$b->id_toko)?>" class="card-text"><?= $b->nama_toko ?></a>
                                    </div>
                                </div>
                                <?php
                                $pilihan_lock = 0;
                                if(!empty($pilihan)) { ?>
                                    <?php foreach ($pilihan as $p) :?>
                                        <?php if ($p->id_barang == $b->id_barang) { ?>
                                        <?php $pilihan_lock = 1; }?>
                                    <?php endforeach ?>
                                <?php } ?>
                                <?php if ($pilihan_lock == 0) { ?>
                                    <?php if ($number >3) {?>
                                        <div class="d-grid gap-2 d-md-block">
                                            <a class="btn btn-secondary" href="#"><i class="fas fa-fw fa-star"></i>Tambah Pilihan</a>
                                        </div>
                                    <?php } else { ?>
                                        <div class="d-grid gap-2 d-md-block">
                                            <a class="btn btn-warning" href="<?= base_url('admin/tambah_pilihan/'.$b->id_barang)?>"><i class="fas fa-fw fa-star"></i>Tambah Pilihan</a>
                                        </div>
                                    <?php } ?>
                                <?php } else { ?>
                                    <div class="d-grid gap-2 d-md-block">
                                        <a class="btn btn-outline-danger" href="<?= base_url('admin/hapus_pilihan/'.$p->id_barang)?>"><i class="fas fa-fw fa-star"></i>Hapus Pilihan</a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                </div>
                <!-- </div> -->
            <?php endforeach;?>
            <?php }
            else{
                echo "kategori tidak Tersedia";
            }
            ?>
        </div>
    </div>
</div>
<div class="modal fade" id="tambah_kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Input Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(). 'admin/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" name="nama_kategori" class="form-control">
                    </div>        
                    <div class="form-group">
                        <label>Gambar kategori</label><br>
                        <input type="file" name="gambar_kategori" class="form-control">
                    </div>
                 <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
    </div>
    </div>
</div>