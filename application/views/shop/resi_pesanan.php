<div class="container-fluid">
    <div class="card">
        <div class="card-body">
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <hr>
        <div class="row">
            <div class="col-lg-6">
                <?= $this->session->flashdata('message'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <form action="<?= base_url('shop/input_resi/'. $id_order) ?>" method="post">
                    <div class="form-group">
                        <label for="ekspidisi" class="col-sm-3 col-form-label">ekspidisi</label>
                        <div class="col-sm-9">
                            <select name="ekspidisi" id="ekspidisi">
                                <option value="JNE">JNE</option>
                                <option value="J&T">J&T</option>
                                <option value="Ninja Express">Ninja Express</option>
                                <option value="TIKI">TIKI</option>
                                <option value="Wahana">Wahana</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="resi" class="col-sm-3 col-form-label">Resi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="resi" 
                            name="resi">
                            <?= form_error('resi','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary">Masukan Resi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

