<div class="container-fluid">
    <div class="row justify-content-center align-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-sm-10 col-12">
            <div class="shadow p-1 mb-5">
                <div class="container text-center m-2">
                    <h3 class="fluid">Edit Toko Anda</h3>  
                </div>
                <hr>
                <div class="row justify-content-center">
                    <div class="col col-lg-6 col-md-6 col-sm-6">
                        <div class="div text-center">
                            <img src="<?=base_url()?>assets/img/profile_toko/default.jpg" class="text-center rounded-circle mx-auto my-auto" style="width:100px;" alt="">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col col-lg-12 col-md-12 col-sm-12">
                    <form class="user m-1" method="post" action="<?= base_url('shop/edit')?>">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nama_toko"><i class="fas fa-store"></i> NAMA TOKO</label>
                                    <input type="text" class="form-control form-control-user" id="id_user" name="id_user" value="<?= $toko->id_user ?>" hidden>
                                    <input type="text" class="form-control form-control-user" id="id_toko" name="id_toko" value="<?= $toko->id_toko ?>" hidden>
                                    <input type="text" class="form-control form-control-user" id="nama_toko" name="nama_toko" placeholder="Nama Toko Anda" value="<?= $toko->nama_toko ?>">
                                    <?= form_error('nama_toko', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="bank"><i class="fas fa-university"></i> Pilih BANK</label>
                                    <select name="bank" id="bank" class="form-control">
                                        <option value="value="<?= $toko->bank ?>""><?= $toko->bank ?></option>
                                        <option value="BCA">BCA</option>
                                        <option value="BNI">BNI</option>
                                        <option value="BRI">BRI</option>
                                        <option value="MANDIRI">MANDIRI</option>
                                        <option value="BSI">BSI</option>
                                        <option value="BTN">BTN</option>
                                        <option value="BJB">BJB</option>
                                        <option value="PERMATA">PERMATA</option>
                                        <option value="BUKOPIN">BUKOPIN</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="rekening"><i class="fas fa-dollar-sign"></i>No Rekening</label>
                                    <input type="number" class="form-control form-control-user" id="no_rekening" name="no_rekening" placeholder="No Rekening Anda" value="<?= $toko->no_rekening ?>">
                                    <?= form_error('no_rekening', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <div  class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <select id="provinsi" class="form-control" name="provinsi">
                                        <option value="">Pilih Provinsi</option>
                                        <?php
                                        // Ambil data provinsi dari database
                                        $provinsiList = $this->db->get('provinsi')->result();
                                        foreach ($provinsiList as $provinsi) {
                                            echo "<option value='{$provinsi->id_provinsi}'>{$provinsi->provinsi}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div  class="form-group">
                                    <label for="kota">Kota</label>
                                    <select class="form-control" id="kota" name="kota">
                                        <option value="">Pilih Kota</option>
                                    </select>
                                    <?= form_error('kota', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#provinsi').change(function() {
        var id_provinsi = $(this).val();
        if (id_provinsi) {
            $.ajax({
                type: 'POST',
                url: '<?= base_url("dashboard/get_kota") ?>', // Ganti dengan URL yang sesuai
                data: 'id_provinsi=' + id_provinsi,
                success: function(data) {
                    $('#kota').html(data);
                }
            });
        } else {
            $('#kota').html('<option value="">Pilih Kota</option>');
        }
    });
});
</script>
