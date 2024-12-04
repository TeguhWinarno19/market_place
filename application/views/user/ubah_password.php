<div class="container-fluid">
    <div class="card">
        <div class="card-body">
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <div class="row">
            <div class="col-lg-6">
                <?= $this->session->flashdata('message'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <form action="<?= base_url('user_set/changepassword') ?>" method="post">
                    <div class="form-group">
                        <label for="current_password" class="col-sm-3 col-form-label">Curret Password</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="current_password" 
                        name="current_password">
                        <?= form_error('current_password','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="new_password1" class="col-sm-3 col-form-label">New Password</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="new_password1" 
                            name="new_password1">
                            <?= form_error('new_password1','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="new_password2" class="col-sm-3 col-form-label">Repeat Password</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="new_password2" 
                            name="new_password2">
                            <?= form_error('new_password2','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary">Ubah Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

