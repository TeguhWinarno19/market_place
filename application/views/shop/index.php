<div class="container-fluid">
    <div class="row">
            <div class="col-6">
                <h3>Barang Saya</h3>
            </div>
            <div class="col-6 text-right">
                <a href="<?= base_url('shop/cetak_data_barang/'.$toko_id); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> Cetak Data</a>
                <a href="<?= base_url('shop/export_excel_barang/'.$toko_id); ?>" class="btn btn-success mb-3"><i class="far fa-file-excel"></i> Export Excell</a>
            </div>
        </div>
    <hr>
    <a href="<?=base_url()?>shop/tambahkan_barang" class="btn btn-primary mb-2"data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah barang</a>
    <hr>
    <div class="card">
        <div class="card-body">
        <div class="row justify-content-center">
            <?php
            if(!empty($barang)){ ?>
            <?php foreach ($barang as $brg) : ?>
                <div class="col-lg-2 col-md-4 col-sm-4 col-6 mb-2">
                    <div class="card shadow-sm">
                        <!--tips: add .text-center,.text-right to the .card to change card text alignment-->
                        <img src="<?php echo base_url('/assets/img/product/'.$brg->gambar) ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6>
                                <small>
                                    <?php 
                                        $max_length = 13;
                                        if(strlen($brg->nama_barang) > $max_length) {
                                            echo htmlspecialchars(substr($brg->nama_barang, 0, $max_length) . '...');
                                        } else {
                                            echo htmlspecialchars($brg->nama_barang);
                                        }
                                    ?>
                                </small>
                            </h6>
                            <h6 class="">
                                <small>
                                    stok : <span class="badge badge-info"><?= $brg->stok ?></span>
                                </small>
                            </h6>
                            <h6 class="text-success font-weight-bold">
                                <small>Rp. <?= number_format($brg->harga, 0, ',', '.'); ?></small>
                            </h6>
                            <h6 class="text-muted">
                                <small>
                                    <?= $brg->kategori?>
                                </small>
                            </h6>
                            <?php echo anchor('shop/detail_barang/'.$brg->id_barang,'<div class="btn btn-success btn-block btn-sm mb-1"><i class="fas fa-search-plus"> </i> Lihat Detail</div>') ?>
                            <?php echo anchor('shop/edit_barang/' .$brg->id_barang, '<div class="btn btn-primary btn-block btn-sm mb-1"><i class="fa fa-edit"></i> EditBarang</div>' ) ?>
                            <?php echo anchor('shop/hapus_barang/' .$brg->id_barang, '<div class="btn btn-danger btn-block btn-sm mb-1"><i class="fa fa-trash"></i > Hapus</div>')?>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
            <?php }
            else{
                echo "Barang tidak Tersedia";
            }
            ?>

        </div>
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
                <form action="<?php echo base_url(). 'shop'; ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col col-col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control shadow-sm rounded-lg p-3" placeholder="Nama barang">
                                <?= form_error('nama_barang', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea type="text" name="keterangan" class="form-control shadow-sm rounded-lg p-3" rows="7" placeholder="Keterangan"></textarea>
                                <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" name="id_kategori" id="">
                                    <option value="">Pilih Kategori</option>
                                    <?php if (!empty($kategori)) { ?>
                                        <?php foreach ($kategori as $ktg) : ?>
                                            <option value="<?= $ktg->id_kategori ?>"><?= $ktg->kategori ?></option>
                                            <?php endforeach;?>
                                        <?php } else{ ?>
                                            <p>Tidak ada Kategori yang tersedia</p>
                                        <?php } ?>
                                </select>
                            </div>
                            <?= form_error('id_kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                            <div class="form-group">
                                <label>Kondisi</label>
                                <select class="form-control shadow-sm rounded-lg" name="kondisi" id="kondisi">
                                    <option value="">Pilih Kondisi</option>
                                    <option value="Baru">Baru</option>
                                    <option value="Bekas">Bekas</option>
                                    <option value="Daur Ulang">Daur Ulang</option>
                                </select>
                            </div>
                            <?= form_error('kondisi', '<small class="text-danger pl-3">', '</small>'); ?>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" name="harga" class="form-control shadow-sm rounded-lg p-3"  placeholder="Harga">
                                <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Stok</label>
                                <input type="text" name="stok" class="form-control shadow-sm rounded-lg p-3"  placeholder="Stok">
                                <?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                
                            
                        </div>
                    </div>
                    <div class="form-group">
                                <label>Gambar Produk</label><br>
                                <input type="file" name="gambar" class="form-control p-1">
                    </div>
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