<div class="container-fluid">
    <div class="row justify-content-center align-content-center">
        <div class="col col-lg-7">
            <div class="shadow p-1">
                <div class="container text-center m-2">
                    <h3 class="fluid">Tambah Alamat</h3>  
                </div>
                <hr>
                <div class="row mb-5">
                    <div class="col col-lg-5 col-md-5 col-sm-12 col-12 align-content-center text-center mb-3">
                        <img src="<?= base_url() ?>assets/img/alamat.png" class="text-center mb-1 mx-auto my-auto" alt="" style="width:250px">
                    </div>
                    <div class="col col-lg-7 col-md-7 col-sm-12 col-12">
                        <form class="user m-1" method="post" action="<?= base_url('dashboard/tambah_alamat'); ?>">
                            <div class="form-group">
                                <label for="penerima"><i class="fas fa-user"></i> Penerima</label>
                                <input type="text" class="form-control" id="penerima" name="penerima" placeholder="Nama Penerima">
                                <?= form_error('penerima', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>    
                            <div class="form-group">
                                <label for="alamat"><i class="fas fa-home"></i> Alamat Rumah</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="row">
                                <div class="col col-lg-3 col-md-3 col-3">
                                    <div class="form-group">
                                        <label for="RT"><i class="fas fa-map-marker"></i> RT</label>
                                        <input type="number" class="form-control" id="RT" name="RT" placeholder="RT">
                                        <?= form_error('RT', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col col-lg-3 col-md-3 col-3">
                                    <div class="form-group">
                                        <label for="RT"><i class="fas fa-map-marker"></i> RW</label>
                                        <input type="number" class="form-control" id="RW" name="RW" placeholder="RW">
                                        <?= form_error('RW', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col col-lg-6 col-md-6 col-6">
                                    <div class="form-group">
                                        <label for="kodepos"><i class="fas fa-map-marker"></i> Kode Pos</label>
                                        <input type="number" class="form-control" id="kodepos" name="kodepos" placeholder="Kode Pos">
                                        <?= form_error('kodepos', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-lg-6 col-12">
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
                                        <?= form_error('provinsi', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                </div>
                                <div class="col col-lg-6 col-12">
                                    <div  class="form-group">
                                        <label for="kota">Kota</label>
                                        <select class="form-control" id="kota" name="kota">
                                            <option value="">Pilih Kota</option>
                                        </select>
                                        <?= form_error('kota', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>                            
                            <button type="submit" class="btn btn-success btn-user btn-block">
                                <strong>Daftarkan Alamat</strong>
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