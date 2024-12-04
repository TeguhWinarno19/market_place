<div class="container-fluid">
    <div class="row justify-content-center">        
        <div class="col-lg-7 col-md-9 col-sm-10 col-12">
            <div class="card">
                <div class="card-header">
                    <h4><strong>Pesan</strong></h4>
                </div>
                <div class="card-body" id="chat-container" style="max-height: 500px; overflow-y: auto;">
                    <?php 
                    // Mengatur zona waktu ke Jakarta
                    date_default_timezone_set('Asia/Jakarta');                    
                    foreach ($chats as $chat): ?>
                        <?php if ($pengguna != $chat->sender): ?>
                            <?php if($chat->id_barang != null){ 
                                $barangku = $this->Model_barang->detail_barang($chat->id_barang)->result()?>
                                <?php foreach($barangku as $b) :?>
                                <div style="text-align: left; margin-bottom: 10px;">
                                    <img style="width:2rem;" src="<?= base_url('assets/img/profile/default.jpg') ?>" alt="">
                                    <small style="color: #6c757d;">Pembeli</small>
                                    <br>
                                    <div style="display: flex; align-items: flex-start; gap: 10px;">

                                        <div style="display: inline-block; background-color: #B0B3FE; padding: 10px; border-radius: 10px;">
                                            <div class="card" style="width:12rem;">
                                                <div class="card-body">
                                                    <img src="<?= base_url('assets/img/product/'.$b->gambar) ?>" alt="" style="width:10rem">      
                                                    <hr>
                                                    <h6><strong><?= $b->nama_barang ?></strong></h6>
                                                    <h6><small>Rp.<?= $b->harga ?></small></h6>
                                                    <a href="<?= base_url('dashboard/detail_barang/'.$b->id_barang) ?>" class="btn btn-success btn-block">Lihat</a>
                                                </div>
                                            </div>
                                            <small style="color: ##D6F7C8;">
                                                <?= date('H:i', $chat->created_at); ?>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            <?php } ?>
                            <div style="text-align: left; margin-bottom: 10px;">
                                <div class="row">
                                    <div class="col-8">
                                    <img style="width:30px;height:30px;" src="<?= base_url('assets/img/profile/default.jpg') ?>" alt="">
                                    <small style="color: #6c757d;">Pembeli</small>
                                    <br>
                                    <div style="display: inline-block; background-color:  #B0B3FE; padding: 10px; border-radius: 10px;">
                                        <h6 style="color: #000000;"><?= $chat->pesan; ?></h6>
                                        <small style="color: ##D6F7C8;">
                                            <?= date('H:i', $chat->created_at); ?>
                                        </small>
                                    </div>
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div style="text-align: right; margin-bottom: 10px;">
                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-8">
                                        <small style="color: #6c757d;">You</small>
                                        <br>
                                        <div style="display: inline-block; background-color: #D6F7C8; padding: 10px; text-align:left; border-radius: 10px;">
                                            <h6 style="color: #000000;"><?= $chat->pesan; ?></h6>
                                            <small style="color: #6c757d;">
                                                <?= date('H:i', $chat->created_at); ?>
                                                <?php if($chat->dilihat == 1){?>
                                                <i class="fas fa-fw fa-eye"></i>
                                                <?php } ?>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <hr>
                    <form action="<?=base_url('chatting/detail_toko/'.$lock.'/'.$id_toko) ?>" method="post">
                        <div class="form-group">
                            <input type="text" value="<?= $id_toko ?>" name="id_toko" hidden>
                            <textarea type="text" name="pesan" class="form-control shadow-sm rounded-lg" rows="2" placeholder="Kirim Pesan"></textarea>
                            <?= form_error('pesan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <button class="btn btn-success" type="submit">
                            <i class="fas fa-fw fa-paper-plane"></i> Kirim Pesan
                        </button>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Auto-scroll ke bawah saat halaman dimuat
window.onload = function() {
    var chatContainer = document.getElementById('chat-container');
    chatContainer.scrollTop = chatContainer.scrollHeight; // Mengatur scroll ke bawah
};

// Auto-scroll ke bawah setelah pengiriman pesan
document.querySelector('form').onsubmit = function() {
    setTimeout(function() {
        var chatContainer = document.getElementById('chat-container');
        chatContainer.scrollTop = chatContainer.scrollHeight; // Mengatur scroll ke bawah setelah pesan dikirim
    }, 100); // Delay sedikit untuk menunggu halaman ter-update
};
</script>
