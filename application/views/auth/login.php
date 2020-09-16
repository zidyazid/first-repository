<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center mx-auto">
        <div class="col-xl-10 col-lg-12 col-md-9 mx-auto">
            <div class="card o-hidden border-0 shadow-lg my-5 col-lg-5 mx-auto">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center text-success">
                                    <h1 class="h4 mb-4">Selamat Datang di Sistem Informasi
                                        Kelulusan v1.0</h1>
                                    <hr>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="POST" action="<?= base_url('auth/index'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nisn" name="nisn"
                                            placeholder="Enter Your Nisn..." value="<?= set_value('nisn'); ?>">
                                        <?= form_error('nisn', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password"
                                            name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                    <hr>
                                </form>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/register'); ?>">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>