<div class="container-fluid">
    <h4><strong>PENGIRIMAN</strong></h4>
    <hr>
    <div class="row justify-content-between">
        <div class="col col-lg-8 col-md-8 col-sm-12 col-12">
            <div class="card mb-2">
                <div class="card-body">
                    <?php foreach ($alamat as $a) : ?>
                        <?php
                        $penerima = $a->nama_penerima;
                        $alamat = $a->alamat.",".$a->rt."/".$a->rw.",Kodepos:".$a->kodepos;
                        ?>
                        <p class=" text-success"> <i class=" fas fa-fw fa-map-marker"></i> Alamat yang di pilih</p>
                        <p>Nama Penerima : <?= $a->nama_penerima ?></p>
                        <p><?= $a->alamat?> , RT<?= $a->rt?>/RW<?= $a->rw?>, Kodepos: <?= $a->kodepos?></p>
                        <p><?= $a->kota?>, <?= $a->provinsi?></p>
                    <?php endforeach ?>
                </div>
            </div>
                    
            <?php
            $ongkir = 16000;
            $asuransi = 500;
            $toko = 0;
            $pesanan = 0;
            $cart_by_toko = [];
            $jumbar= 0;
            foreach ($cart as $item) {
                $cart_by_toko[$item['nama_toko']][] = $item;
                $toko++;
                
            }
            ?>
            <?php foreach ($cart_by_toko as $nama_toko => $items): ?>
                <?php $pesanan++;?>
                <div class="card mb-2">
                    <div class="card-body">
                        <h5> Pesanan <?=$pesanan ?></h5>
                        <h6><strong>Dilayani oleh Apripedia</strong></h6>
                        <h6><?php echo $nama_toko; ?></h6>
                        <?php foreach ($items as $item): ?>
                            <?php $jumbar++;?>
                            <div class="row mt-2">
                                <?php 
                                $barangku = $this->Model_barang->detail_barang($item['id'])->result();
                                $barang = $barangku ? $barangku[0] : null; 
                                ?>
                                <div class="col-2">
                                    <?php if ($barang): ?>
                                        <img src="<?php echo base_url('/assets/img/product/'.$barang->gambar) ?>" alt="<?php echo $barang->gambar; ?>" style="width: 5rem; border-radius: 20px;" class="img-fluid">
                                    <?php endif; ?>
                                </div>
                                <div class="col-7">
                                    <p><?php echo $item['name']; ?></p>
                                </div>
                                <div class="col-3">
                                    <p class="text-right">
                                        <strong>
                                            <?php echo $item['qty']; ?> x Rp. <?= number_format($item['price'], 0, ',', '.'); ?>
                                        </strong>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="card mt-2">
                            <div class="card-body">
                                <strong> <i class="fas fa-truck"></i> Pengiriman</strong>
                                <hr>
                                <p>Reguler : Rp. 16.000</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <div class="col col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class=" text-black-50"><strong>Ringkasan Belanja</strong></h6>
                    <?php
                    $total_harga_barang = $this->cart->total();
                    $total_ongkir = $pesanan * $ongkir;
                    $total_asuransi = $jumbar * $asuransi;
                    $biaya_aplikasi = 1000;
                    $total_bayar = $total_harga_barang+$total_ongkir+$total_asuransi+$biaya_aplikasi;
                    $pajak = $total_bayar * 12 /100;
                    $total_belanja = $total_bayar + $pajak;
                    ?>
                    <div class="row justify-content-between mb-1">
                        <div class="col-6">Total Harga (<?= $jumbar ?> Barang)</div>
                        <div class="col-6 text-right">Rp. <?= number_format($total_harga_barang, 0, ',', '.'); ?></div>
                    </div>
                    <div class="row justify-content-between mb-1">
                        <div class="col-6">Total ongkir (<?= $pesanan ?> Pesanan)</div>
                        <div class="col-6 text-right">Rp. <?= number_format($total_ongkir, 0, ',', '.'); ?></div>
                    </div>
                    <div class="row justify-content-between mb-1">
                        <div class="col-6">Asuransi (<?= $jumbar ?> Barang)</div>
                        <div class="col-6 text-right">Rp. <?= number_format($total_asuransi, 0, ',', '.'); ?></div>
                    </div>
                    <div class="row justify-content-between mb-1">
                        <div class="col-6">Biaya Aplikasi</div>
                        <div class="col-6 text-right">Rp. <?= number_format($biaya_aplikasi, 0, ',', '.'); ?></div>
                    </div>
                    <hr>
                    <div class="row justify-content-between mb-1">
                        <div class="col-6">Total Belum Kena Pajak</div>
                        <div class="col-6 text-right">Rp. <?= number_format($total_bayar, 0, ',', '.'); ?></div>
                    </div>
                    <div class="row justify-content-between mb-1">
                        <div class="col-6">Pajak 12%</div>
                        <div class="col-6 text-right">Rp. <?= number_format($pajak, 0, ',', '.'); ?></div>
                    </div>
                    <hr>
                    <div class="row justify-content-between mb-1">
                        <div class="col-6"><strong>Total Belanja</strong></div>
                        <div class="col-6 text-right"><strong>Rp. <?= number_format($total_belanja, 0, ',', '.'); ?></strong></div>
                    </div>
                    <hr>
                    <form action="<?= base_url()?>snap/token" method="post">
                        <input type="text" value="<?=$total_belanja?>" name="total_belanja" hidden>
                        <input type="text" value="<?=$total_ongkir?>" name="total_ongkir" hidden>
                        <input type="text" value="<?=$total_belanja?>" name="total_belanja" hidden>
                        <input type="text" value="<?=$total_belanja?>" name="total_belanja" hidden>
                        <button id="bayarButton" class="btn btn-success btn-user btn-block" type="button">Bayar</button>
                    </form>

                </div>
                
            </div>
        </div>
    </div>
</div>
<script>
    // Fungsi untuk memulai proses pembayaran
    function startPayment() {
        const total_belanja = <?= $total_belanja; ?>;

        fetch('<?= base_url() ?>snap/token', {
            method: 'POST',
            body: new URLSearchParams('total_belanja=' + total_belanja),
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        })
        .then(response => response.json())
        .then(data => {
            // Pastikan data.token ada sebelum melanjutkan
            if (data.token) {
                snap.pay(data.token, {
                    onSuccess: function(result) {
                    $.post("<?php echo site_url('snap/finish'); ?>", { result_data: JSON.stringify(result) }, function(response) {
                    window.location.href = "<?php echo site_url('dashboard/proses_pesananku/'.$a->id_alamat); ?>"; // Ganti URL sesuai dengan halaman konfirmasi
                        });
                    },

                    onPending: function(result) {
                        console.log('Payment Pending:', result);
                    },
                    onError: function(result) {
                        alert("Pembayaran gagal!");
                    }
                });
            } else {
                console.error('Token pembayaran tidak tersedia');
            }
        })
        .catch(error => {
            console.error('Error fetching token:', error);
        });
    }

    // Tambahkan event listener pada tombol bayar
    document.querySelector('#bayarButton').addEventListener('click', startPayment);
</script>
