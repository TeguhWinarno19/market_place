<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT DATA BARANG</h3>
    <?php foreach ($barang as $b) : ?>
        <form action="<?php echo base_url(). 'shop/edit_barang/'.$b->id_barang; ?>" method="post" enctype="multipart/form-data">                            
            <div class="row">
                <div class="col col-lg-6 col-md-12 col-sm-12 col-12">                    
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control shadow-sm rounded-lg p-3" value="<?= $b->nama_barang ?>" placeholder="Nama barang">
                        <input type="text" name="id_barang" class="form-control shadow-sm rounded-lg p-3" value="<?= $b->id_barang ?>" placeholder="Nama barang" hidden>
                        <?= form_error('nama_barang', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea type="text" name="keterangan" class="form-control shadow-sm rounded-lg p-3" rows="10" placeholder="Keterangan"><?= $b->keterangan ?></textarea>
                        <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group mb-3">
                            <h6>Gambar</h6>
                            <img src="<?= base_url("assets/img/product/") . $b->gambar ?>" class="img-thumbnail" alt="Product Image">
                            <div class="custom-file mt-2">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                        </div>
                        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" name="id_kategori" id="">
                                    <option value="<?= $b->id_kategori ?>"><?= $b->kategori ?></option>
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
                                    <option value="<?= $b->kondisi ?>"><?= $b->kondisi ?></option>
                                    <option value="Baru">Baru</option>
                                    <option value="Bekas">Bekas</option>
                                    <option value="Daur Ulang">Daur Ulang</option>
                              </select>
                            </div>
                            <?= form_error('kondisi', '<small class="text-danger pl-3">', '</small>'); ?>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" name="harga" class="form-control shadow-sm rounded-lg p-3" value="<?= $b->harga ?>" placeholder="Harga">
                                <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Stok</label>
                                <input type="text" name="old" class="form-control shadow-sm rounded-lg p-3" value="<?= $b->gambar ?>" placeholder="Harga" hidden>
                                <input type="text" name="stok" class="form-control shadow-sm rounded-lg p-3" value="<?= $b->stok ?>"  placeholder="Stok">
                                <?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a class="btn btn-danger" href="<?= base_url() ?>shop">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    <?php endforeach ?>
</div>

<script>
    // Menampilkan nama file yang dipilih di label
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("image").files[0].name;
        var label = document.querySelector('.custom-file-label');
        label.textContent = fileName;
    });
</script>