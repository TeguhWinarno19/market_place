<div class="container-fluid">
<?php $nama_toko_ini = "" ?>
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-3 col-sm-5 col-12 mb-3">
            <div class="card">
                <div class="card-body bg-success">
                    <h3 class=" text-white">Daftar Chat</h3>
                    <hr>
                    <?php foreach ($chats1 as $chat): ?>
                        <?php $lawan = $this->Model_toko->toko_by_id2($chat->id_toko)->result() ?>
                        <?php foreach($lawan as $l) :?>
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-lg-2 col-md-3 col-3 text-center mb-2">
                                        <img src="<?= base_url('assets/img/profile_toko/'.$l->logo_toko) ?>" style="width:30px;" alt="">
                                    </div>
                                    <div class="col-lg-7 col-md-9 col-12 mb-2">
                                        <h5><strong><?= $l->nama_toko ?></strong></h5>
                                        <?= $chat->pesan; ?>
                                    </div>
                                    <div class="col-lg-3 col-md-12 col-12 mb-2">
                                        <a href="<?= site_url('chatting/detail/' . $chat->id_user . '/' . $chat->id_toko); ?>" class="btn btn-success btn-block">
                                            Lihat
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-7 col-12">
            <div class="card mb-2">
                <div class="card-header">
                    <h3>Pesan</h3>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <h4>Belum ada pesan yang di muat</h4>
                        </div>
                    </div>
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
