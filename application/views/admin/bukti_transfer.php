<div class="container-fluid">
    <h3>Bukti Transfer</h3>
        <form action="<?php echo base_url(). 'admin/proses_transaksi/'.$id_order; ?>" method="post" enctype="multipart/form-data">                            
            <div class="row">
                <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="form-group mb-3">
                                <h6>Gambar</h6>
                                <img src="" class="img-thumbnail" alt="Product Image">
                                <div class="custom-file mt-2">
                                    <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                    <label class="custom-file-label" for="gambar">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="modal-footer">
            <a class="btn btn-danger" href="<?= base_url() ?>shop">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
</div>
<script>
    // Menampilkan nama file yang dipilih di label
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("image").files[0].name;
        var label = document.querySelector('.custom-file-label');
        label.textContent = fileName;
    });
</script>