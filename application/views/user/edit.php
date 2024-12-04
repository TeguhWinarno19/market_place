<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-body">
        <h2 class="text-gray-800"><?= $title; ?></h2>
        <hr>
        <div class="row card-body">
            <div class="col-lg-6 col-md-8 col-sm-12 col-12">
                <?= form_open_multipart('User_set/edit'); ?>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="email"
                    name="email" value="<?= $user['email']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="name"
                    name="name" value="<?= $user['nama'] ?>">
                    <?= form_error('name','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">Picture</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url("assets/img/profile/") . $user['image'] ?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" 
                                    id="image" name="image">
                                    <label class="custom-file-label"
                                    for="image">Choose file</label>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-end">

                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        </div>
    </div>
<!-- Page Heading -->

</div>
<!-- /.container-fluid -->