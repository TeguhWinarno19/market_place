<div class="container-fluid">
    <h3>Detail Barang</h3>
    <hr>
    <?php foreach ($barang as $b) : ?>
        <div class="row justify-content-center">
            <div class="col col-lg-3 col-md-4 col-sm-6 col-12 mt-5 align-items-center text-center">
                <img class="card-img-top align-items-center" style="width: 17rem; border-radius: 20px;" src="<?php echo base_url('/assets/img/product/'.$b->gambar) ?>" alt="Card image cap">
            </div>
            <div class="col col-lg-6 col-md-4 col-sm-6 col-12 mt-5">
                <div class="container">
                    <h3><strong><?= $b->nama_barang ?></strong></h3>
                    <h2>Rp. <?= number_format($b->harga, 0, ',', '.'); ?></h2>
                    <hr>
                    <div class="row">
                        <div class="col-2">
                            <small><strong>Disukai</strong></small>
                        </div>
                        <div class="col-9">
                            <small><strong><?= $b->wishlist_count; ?> orang</strong></small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <small><strong>Terjual</strong></small>
                        </div>
                        <div class="col-9">
                            <small><strong><?= $b->terjual_count; ?></strong></small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <h6>Kondisi</h6>
                        </div>
                        <div class="col-10">
                            <h6><?= $b->kondisi ?></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <h6>Kategori</h6>
                        </div>
                        <div class="col-9">
                            <h6>
                                <a class=" text-decoration-none text-success" href="<?php echo base_url('dashboard/lihat_kategori/'.$b->id_kategori)?>">
                                    <strong><?= $b->kategori ?></strong>
                                </a>
                            </h6>
                        </div>
                    </div>                        
                    <div class="row">
                        <div class="col-2">
                            <h6>Stok</h6>
                        </div>
                        <div class="col-9">
                            <h6>
                                <?= $b->stok ?>
                            </h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <h6><strong>Keterangan</strong></h6>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col-12">
                            <p><?= $b->keterangan ?></p>
                        </div>
                    </div>                     
                </div>
                <hr>
                <div class="row justify-content-left align-items-center">
                    <div class="col col-lg-2 text-right">
                        <img class="rounded-circle" style="width:60px" src="<?php echo base_url('/assets/img/profile_toko/'.$b->logo_toko) ?>" alt="Card image cap">
                    </div>
                    <div class="col col-lg-9">
                        <a class="text-decoration-none text-black-50" href="<?php echo base_url('dashboard/detail_toko_beranda/'.$b->id_toko)?>">
                            <i class=" fas fa-fw fa-store"></i> <?= $b->nama_toko ?>
                        </a>
                        <br>
                        <a class="mt-2 text-decoration-none text-black-50" href="<?php echo base_url('dashboard/detail_toko_beranda/'.$b->id_toko)?>"><i class="fas fa-fw fa-map-marker"></i><?= $b->kota ?></a>
                    </div>
                </div>
            </div>
            <div class="col col-lg-3 col-md-4 col-sm-6 col-12 mt-5">
                <?= $this->session->flashdata('message');?>
                <div class="card shadow-sm">
                    <div class="container mt-1 align-items-center text-center">
                        <h4>Atur Jumlah Barang</h4>
                        <hr>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col col-lg-10 col-md-10 col-sm-10 col-8">
                            <div class="container">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-danger" id="minus" onclick="decrement()">-</button>
                                    </div>
                                    <input type="text" class="form-control text-center" name="counter" id="counter" value="0" style="width:5px;" oninput="updateCounterAndSubtotal()">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-success" id="plus" onclick="increment()">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                    <div class="container mt-2">
                        <p>maks Pembelian : <?= $b->stok ?> pcs</p>
                        <p>subtotal :</p>
                    </div>
                    <div class="row p-2">
                        <div class="col col-lg-3 text-right">
                            <p>Rp.</p>
                        </div>
                        <div class="col col-lg-9">
                            <input type="text" class="form-control text-center mb-2" name="subtotal" id="subtotal" value="0" readonly>
                        </div>
                    </div>
                    <div class="container mt-1 text-center">
                        <form action="<?= base_url()?>dashboard/tambah_keranjang/<?=$b->id_barang?>" method="post">
                            <input type="text" value="<?= $b->id_barang ?>" name="id_barang" hidden>
                            <input type="text" value="<?= $b->nama_barang ?>" name="nama_barang" hidden>
                            <input type="text" value="<?= $b->harga ?>" name="harga" hidden>
                            <input type="text" value="<?= $b->id_toko ?>" name="id_toko" hidden>
                            <input type="text" value="<?= $b->nama_toko ?>" name="nama_toko" hidden>
                            <input type="text" value="<?= $b->kota ?>" name="kota" hidden>
                            <input type="text" value="0" id="satuan" name="satuan" hidden>
                            <?php if (!empty($user['nama'])){ ?>
                            <button class="btn btn-success" type="submit">
                                <i class="fas fa-fw fa-plus"></i> Keranjang
                            </button>
                            <?php } else {?>
                                <a href="<?= base_url('auth')?>" class="btn btn-success">
                                    <i class="fas fa-fw fa-plus"></i> Keranjang
                                </a>
                            <?php } ?>
                        </form>
                    </div>
                    <hr>
                    <div class="text-center mb-2">
                    <?php
                    if (empty($user['nama'])){ ?>
                        <a href="<?= base_url('auth')?>" class="btn btn-outline-success mt-1">
                            <i class=" fas fa-fw fa-comment"></i>Chat
                        </a>
                        <a href="<?= base_url('auth')?>" class="btn btn-outline-success mt-1">
                            <i class=" fas fa-fw fa-heart"></i>Whislist
                        </a>
                        <a href="javascript:void(0);" class="btn btn-outline-success" id="shareButton" >
                            <i class="fas fa-fw fa-share"></i> Share
                        </a>
                    <?php } else {?>
                        <a href="<?= base_url('chatting/start/'.$b->id_toko.'/'.$b->id_barang) ?>" class="btn btn-outline-success mt-1">
                            <i class=" fas fa-fw fa-comment"></i>Chat
                        </a>
                        <?php 
                            $lock = 0;
                            if(!empty($whistlist)){ ?>
                                <?php foreach ($whistlist as $w) : ?>
                                    <?php if ($b->id_barang == $w->id_barang)
                                    {
                                        $lock = 1;
                                    }
                                    ?>
                                <?php endforeach ?>
                            <?php } ?>
                            <?php if($lock == 1){?>
                            <a href="<?= base_url('dashboard/hapus_whistlist/'.$b->id_barang)?>" class="btn btn-outline-danger mt-1">
                                <i class=" fas fa-fw fa-heart"></i>Whislist
                            </a>
                            <?php } else { ?>
                                <a href="<?= base_url('dashboard/tambahkan_whistlist/'.$b->id_barang)?>" class="btn btn-outline-success mt-1">
                                    <i class=" fas fa-fw fa-heart"></i>Whislist
                                </a>
                            <?php } ?>
                            <a href="javascript:void(0);" class="btn btn-outline-success mt-1" id="shareButton">
                                <i class="fas fa-fw fa-share"></i> Share
                            </a>    
                        <?php } ?>                            
                    </div>
                </div>   
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-11">
                <div class="card">
                    <div class="card-body">
                    <h3>Ulasan Barang</h3>
                        <?php $ulasan = $this->Model_barang->ulasan_barang($b->id_barang)->result();?>
                        <?php if(!empty($ulasan)){?>
                            <?php foreach($ulasan as $u) :?>
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <h6><strong>Dari : <?= $u->nama_user ?> ( <?= $u->rating?> / 5)</strong></h6>
                                        <h6>
                                            <?php for ($i = 0; $i < $u->rating; $i++) : ?>
                                                <i class="fas fa-star text-warning"></i>
                                            <?php endfor; ?>
                                        </h6>
                                        <hr>
                                        <h6><?= $u->ulasan ?></h6>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>

<script>
    let counter = 0;
    const maxStock = <?= $b->stok ?>; // Mengambil stok dari PHP
    const price = <?= $b->harga ?>; // Mengambil harga barang dari PHP

    function increment() {
        if (counter < maxStock) {
            counter++;
            document.getElementById("counter").value = counter;
            updateSubtotal();
            updateSatuan();
        }
    }

    function decrement() {
        if (counter > 0) {
            counter--;
            document.getElementById("counter").value = counter;
            updateSubtotal();
            updateSatuan();
        }
    }
    function updateSatuan() {
        document.getElementById("satuan").value = counter;
    }

    function updateSubtotal() {
        const subtotal = counter * price;
        document.getElementById("subtotal").value = subtotal.toLocaleString('id-ID');
    }

    function updateCounterAndSubtotal() {
        // Mengambil nilai counter dari input dan mengubahnya menjadi integer
        counter = parseInt(document.getElementById("counter").value);

        // Memastikan nilai counter tidak melebihi stok dan tidak negatif
        if (isNaN(counter) || counter < 0) {
            counter = 0;
        } else if (counter > maxStock) {
            counter = maxStock;
        }

        // Memperbarui nilai counter di input dan subtotal
        document.getElementById("counter").value = counter;
        updateSubtotal();
    }
</script>
<script>
    document.getElementById('shareButton').addEventListener('click', function() {
        // Mendapatkan URL halaman saat ini
        var currentUrl = window.location.href;

        // Membuat elemen input sementara untuk menyalin URL
        var tempInput = document.createElement('input');
        tempInput.value = currentUrl;
        document.body.appendChild(tempInput);

        // Memilih teks input dan menyalin ke clipboard
        tempInput.select();
        tempInput.setSelectionRange(0, 99999); // Untuk mobile devices
        document.execCommand('copy');

        // Menghapus elemen input sementara
        document.body.removeChild(tempInput);

        // Menampilkan pesan bahwa URL berhasil disalin
        alert('URL berhasil disalin ke clipboard: ' + currentUrl);
    });
</script>
