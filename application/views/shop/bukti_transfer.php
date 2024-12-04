<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Bukti Transfer</h5>
        </div>
        <div class="card-body">
            <?php foreach ($order as $o) :?>
            <img src="<?= base_url('assets/img/bukti_transfer/'.$o->gambar) ?>"  style="width:17rem;"alt="">
            <?php endforeach ?>
        </div>
    </div>
</div>