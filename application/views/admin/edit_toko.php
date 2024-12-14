<div class="contaier-fluid p-1">
    <div class="card">
        <form class="user m-1" method="post" action="<?= base_url('admin/edit_toko/').$toko->id_toko?>" enctype="multipart/form-data">
        <div class="card-body">
            <h3>Edit Data Toko</h3>
            <hr>
            <div class="row">
                <div class="col col-4">
                    <h6>Profile</h6>
                    <img src="<?php echo base_url('/assets/img/profile_toko/'.$toko->logo_toko) ?>" class="img-fluid img-profile rounded-circle" alt="Hilang">
                    <input type="text" name="old" class="form-control shadow-sm rounded-lg p-3" value="<?= $toko->logo_toko?>" placeholder="Gambar" hidden>
                    <input type="text" name="id_toko" class="form-control shadow-sm rounded-lg p-3" value="<?= $toko->id_toko?>" placeholder="Gambar" hidden>
                    <div class="custom-file mt-2">
                        <input type="file" class="custom-file-input" id="image" name="image">
                       <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
                <div class="col col-8">
                    <div class="form-group">
                        <label>Nama Toko</label>
                        <input type="text" name="toko" class="form-control shadow-sm rounded-lg p-3" value="<?= $toko->nama_toko ?>" placeholder="Nama Toko">
                        <?= form_error('toko', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="row mt-2">
                        <div class="col-5">
                            <div  class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <select id="provinsi" class="form-control" name="provinsi">
                                    <option value="<?= $toko->id_provinsi ?>"><?= $toko->provinsi ?></option>
                                    <hr>
                                    <?php
                                    // Ambil data provinsi dari database
                                    $provinsiList = $this->db->get('provinsi')->result();
                                    foreach ($provinsiList as $provinsi) {
                                        echo "<option value='{$provinsi->id_provinsi}'>{$provinsi->provinsi}</option>";
                                    }
                                    ?>
                                </select>
                            <?= form_error('provinsi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-5">
                            <div  class="form-group">
                                <label for="kota">Kota</label>
                                <select class="form-control" id="kota" name="kota">
                                    <option value="<?= $toko->id_kota ?>"><?= $toko->kota ?></option>
                                    <hr>
                                    <option value="">""</option>
                                </select>
                                <?= form_error('kota', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="<?= $toko->status ?>">
                                        <?php
                                        if ( $toko->status == 1){
                                            echo "ON";
                                        }else {echo "OFF";}
                                        ?>
                                    </option>
                                    <hr>
                                    <option value="0">OFF</option>
                                    <option value="1">ON</option>
                                </select>
                                <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col col-6">
                            <div class="form-group">
                                <label for="bank"><i class="fas fa-university"></i> Pilih BANK</label>
                                <select name="bank" id="bank" class="form-control">
                                    <option value="<?=$toko->bank ?>"><?= $toko->bank ?></option>
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
                                <?= form_error('bank', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col col-6">
                            <div class="form-group">
                                <label for="rekening"><i class="fas fa-dollar-sign"></i>No Rekening</label>
                                <input type="number" class="form-control" id="no_rekening" name="no_rekening" placeholder="No Rekening Anda" value="<?= $toko->no_rekening ?>">
                                <?= form_error('no_rekening', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-right mt-2"> 
                        <a class="btn btn-danger" href="<?= base_url() ?>admin/shop_management">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
