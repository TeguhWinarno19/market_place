<div class="container-fluid">
    <h3>Kategori saya</h3>
    <hr>
    <a href="<?=base_url()?>admin/tambahkan_kategori" class="btn btn-primary mb-2"data-toggle="modal" data-target="#tambah_kategori"><i class="fas fa-plus fa-sm"></i> Tambah kategori</a>
    <hr>
    <div class="container-fluid">
        <div class="row">
            <?php
            if(!empty($kategori)){ ?>
            <?php foreach ($kategori as $ktg) : ?>
                <div class="card shadow-sm m-1 justify-content-center p-1" style="width:8rem">
                    <img src="<?php echo base_url('/assets/img/kategori/'.$ktg->gambar_kategori) ?>" class="img-profile rounded-circle" alt="...">
                    <div class="card-body">
                        <p class="card-title text-center"><strong><?php echo $ktg->kategori ?></strong></p>                            
                    </div>
                    <div class="justify-content-center mb-1">
                        <?php $fav_lock = 0; ?>
                        <?php if(!empty($favorit)){ ?>
                            <?php foreach ($favorit as $fav) : ?>
                            <?php
                            if ($ktg->id_kategori == $fav->id_kategori){
                                $fav_lock = 1;
                            }
                            ?>
                            <?php endforeach ?>
                            <?php }?>
                            <?php
                            if ($fav_lock == 0){ ?>
                            <?php echo anchor('admin/tambahkan_favorit/' .$ktg->id_kategori, '<div class="btn btn-outline-warning btn-sm "><i class="fa fa-fw fa-star"></i></div>' ) ?>
                            <?php } else {?>
                                <?php echo anchor('admin/hapus_favorit/' .$ktg->id_kategori, '<div class="btn btn-outline-secondary btn-sm "><i class="fa fa-fw fa-star-half"></i></div>' ) ?>
                            <?php } ?>
                                <?php echo anchor('admin/edit_kategori/' .$ktg->id_kategori, '<div class="btn btn-outline-primary btn-sm"><i class="fa fa-fw fa-edit"></i></div>' ) ?>
                                <?php echo anchor('admin/data_kategori/hapus/' .$ktg->id_kategori, '<div class="btn btn-outline-danger btn-sm"><i class="fa fa-fw fa-trash"></i></div>')?>
                    </div>
                </div>
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