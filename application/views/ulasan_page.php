<div class="container-fluid">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Ulasan Anda</h3>
                <hr>
                <?php foreach($pesanan as $p):?>
                    <div class="row">
                        <img class="col-4" src="<?= base_url('assets/img/product/'.$p->gambar) ?>" alt="">
                        <div class="col-8">
                            <h4><strong><?= $p->nama_barang ?></strong></h4>
                            <h6><?= $p->nama_toko ?></h6>
                            <h6><strong>Rp.<?= number_format($p->harga,0,',','.') ?></strong></h6>
                            <div class="card">
                                <div class="card-body">
                                    <form class="user m-1" method="post" action="<?= base_url('dashboard/ulasan_produk/'.$p->id_detail); ?>">   
                                        <div class="row">
                                            <div class="col col-lg-4 col-12">
                                                <div class="form-group">
                                                    <label for="nama"><i class="fas fa-user"></i> Nama</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="nama">
                                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    <input type="text" class="form-control" id="id_barang" value="<?= $p->id_barang ?>" name="id_barang" placeholder="id_barang" hidden>
                                                    <input type="text" class="form-control" id="id_detail" value="<?= $p->id_detail ?>" name="id_detail" placeholder="id_detail" hidden>
                                                </div> 
                                                <div  class="form-group">
                                                    <label for="rating"><i class="fas fa-star text-warning"></i> Rating</label>
                                                    <select id="rating" class="form-control" name="rating">
                                                        <option value="">Masukan Rating</option>
                                                        <option value="5">5</option>
                                                        <option value="4">4</option>
                                                        <option value="3">3</option>
                                                        <option value="2">2</option>
                                                        <option value="1">1</option>
                                                    </select>
                                                    <?= form_error('rating', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col col-lg-8 col-12">
                                                <div class="form-group">
                                                    <label for="ulasan"><i class="fas fa-sticky-note"></i> Ulasan</label>
                                                    <textarea type="text" name="ulasan" class="form-control shadow-sm rounded-lg" rows="5" placeholder="Ulasan anda"></textarea>
                                                    <?= form_error('ulasan', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>                            
                                        <button type="submit" class="btn btn-success btn-block">
                                            <strong>Tambahkan Ulasan</strong>
                                        </button>                
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach?>
            </div>
        </div>
    </div>
</div>