<div class="container-fluid">
    <h4>Chat</h4>
    <hr>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Kepada : </h5>
                            <?php foreach ($toko as $t) :?>
                            <div class="row mt-2">
                                <img class="col-3" src="<?= base_url('assets/img/profile_toko/'.$t->logo_toko) ?>" alt="">
                                <div class="col-9">
                                    <h6><?= $t->nama_toko ?></h6>
                                    <h6><?= $t->kota ?></h6>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-body">
                            <h5>Product : </h5>
                            <?php foreach ($barang as $b) :?>
                            <div class="row mt-2">
                                <img class="col-3" src="<?= base_url('assets/img/product/'.$b->gambar) ?>" alt="">
                                <div class="col-9">
                                    <h6><?= $b->nama_barang ?></h6>
                                    <h6><?= $b->kategori ?></h6>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="form">
                        <form action="<?= base_url('Chatting/start/'.$id_toko.'/'.$id_barang) ?>" method="post">
                            <div class="form-group">
                                <label for="ulasan"><i class="fas fa-comment"></i> Pesan</label>
                                <input type="text" value="<?= $id_toko ?>" name="id_toko" hidden>
                                <input type="text" value="<?= $id_barang ?>" name="id_barang" hidden>
                                <textarea type="text" name="pesan" class="form-control shadow-sm rounded-lg" rows="8" placeholder="Kirim Pesan"></textarea>
                                <?= form_error('pesan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <button class="btn btn-success" type="submit">
                                <i class="fas fa-fw fa-paper-plane"></i> Kirim Pesan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>