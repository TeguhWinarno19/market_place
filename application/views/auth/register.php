<div class="container">
    <h1 class="text-center mt-2 text-">Aprilpedia</h1>
        <div class="card o-hidden border-0 shadow-lg my-5">
            
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image">
                        <img class="img-fluid" src="<?= base_url()?>assets/img/register.jpg" alt="">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="post" action="<?= base_url()?>/auth/daftar">
                                <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="kode" name="kode" value="<?= $kode ?>" hidden>
                                        <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full Name">
                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email" name="email"
                                        placeholder="Email Address">
                                        <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" id="no_telepon" name="no_telepon"
                                        placeholder="No Telepon">
                                        <?= form_error('no_telepon','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password1"
                                            id="password1" placeholder="Password">
                                        <?= form_error('password1','<small class="text-danger pl-3">','</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="password2"
                                            id="password2" placeholder="Repeat Password">
                                        <?= form_error('password2','<small class="text-danger pl-3">','</small>'); ?>
                                    </div>
                                </div>
                                <button href="<?= base_url()?>auth/daftar" class="btn btn-success btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                                <a class="btn btn-success btn-user btn-block" href="<?= base_url()?>auth/index">
                                    <strong>Already have an account? Login!</strong>
                                </a>
                                
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>