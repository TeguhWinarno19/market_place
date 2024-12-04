<div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <h1 class="text-center mt-2 text-black-50">Aprilpedia</h1>
                <div class="card o-hidden border-0 shadow-lg my-5">
                    
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <img  class="img-fluid mx-auto" src="<?= base_url()?>assets/img/Login.jpg" alt="Gambar login">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <?= $this->session->flashdata('message');?>
                                    <form class="user" method="post" action="<?=base_url('auth'); ?>">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp" name="email"
                                                placeholder="Enter Email Address...">
                                                <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password"
                                                id="password" placeholder="Password">
                                                <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-user btn-block">
                                            <strong>Login</strong>
                                        </button>
                                        <hr>
                                        <a class="btn btn-user btn-success btn-block" href="<?= base_url()?>auth/daftar/"><strong>Create an Account!</strong></a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>