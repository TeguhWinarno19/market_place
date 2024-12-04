<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT KATEGORI</h3>
    <hr>
    <?php foreach ($kategori as $b) : ?>
        <form action="<?php echo base_url(). 'admin/edit_kategori/'.$b->id_kategori; ?>" method="post" enctype="multipart/form-data">                            
            <div class="row justify-content-center">
                <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="form-group mb-3 text-center">
                        <h6>Gambar Kategori</h6>
                        <img src="<?= base_url("assets/img/kategori/") . $b->gambar_kategori ?>" style="width: 10rem;" class="img-thumbnail" alt="Product Image">
                        <div class="custom-file mt-2">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>            
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" name="nama_kategori" class="form-control shadow-sm rounded-lg p-3" value="<?= $b->kategori ?>" placeholder="Nama Kategori">
                        <input type="text" name="id_kategori" class="form-control shadow-sm rounded-lg p-3" value="<?= $b->id_kategori ?>" placeholder="" hidden>
                        <input type="text" name="old" class="form-control shadow-sm rounded-lg p-3" value="<?= $b->gambar_kategori?>" placeholder="Gambar" hidden>
                        <?= form_error('nama_kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <a class="btn btn-danger" href="<?= base_url() ?>admin/kategori">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
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