<div class="container-fluid">
    <div class="row justify-content-center align-content-center">
        <div class="col col-lg-7">
            <div class="shadow p-1">
                <div class="container text-center m-2">
                    <h3 class="fluid">Buat Toko Impian Anda</h3>  
                </div>
                <hr>
                <div class="row mb-5">
                    <div class="col col-lg-6 col-md-6 col-sm-6 align-content-center justify-content-center">
                        <img src="<?=base_url()?>assets/img/profile_toko/default.jpg" class="bg-sucess img-fluid mb-1 rounded-circle mx-auto my-auto" alt="">
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-6">
                    <form class="user m-1" method="post" action="<?= base_url()?>dashboard/daftar">
                        <div class="form-group">
                            <label for="nama_toko"><i class="fas fa-store"></i> NAMA TOKO</label>
                            <input type="text" class="form-control form-control-user" id="nama_toko" name="nama_toko" placeholder="Nama Toko Anda">
                            <?= form_error('nama_toko', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
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
                        </div>

                        <div class="form-group">
                            <label for="bank"><i class="fas fa-university"></i> Pilih BANK</label>
                            <select name="bank" id="bank" class="form-control">
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
                            <input type="number" class="form-control form-control-user" id="no_rekening" name="no_rekening" placeholder="No Rekening Anda">
                            <?= form_error('no_rekening', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <button href="<?= base_url()?>dashboard/daftar" class="btn btn-success btn-user btn-block">
                            Daftar
                        </button>                
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
