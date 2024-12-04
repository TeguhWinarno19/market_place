<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h3>Daftar Chat</h3>
            <?php foreach ($chats as $chat): ?>
                <?php $lawan = $this->Model_user->detail_user($chat->id_user)->result() ?>
                <?php foreach($lawan as $l) :?>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-1 col-3 text-center mb-2">
                                <img src="<?= base_url('assets/img/profile/'.$l->image) ?>" style="width:50px;" alt="">
                            </div>
                            <div class="col-lg-8 col-9 mb-2">
                                <h5><strong><?= $l->nama ?></strong></h5>
                                <?= $chat->pesan; ?>
                            </div>
                            <div class="col-lg-3 col-12 mb-2">
                                <a href="<?= site_url('chatting/detail_toko/' . $chat->id_user . '/' . $chat->id_toko); ?>" class="btn btn-success btn-block">
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
