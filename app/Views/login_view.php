<?= $this->extend('layout/template_loginandregister') ?>
<?= $this->section('content'); ?>

    <!-- Section: Classic admin cards -->
    <section class="pb-3">

        <!-- Grid row -->
        <div class="row">
        <!-- Grid column -->
        <div class="col-12 mb-4 d-flex justify-content-center mb-xl-0">
            <!-- Desktop -->
            <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 p-sm-0 p-md-0">
                <!-- Card Primary -->
                <div class="card">
                    <div class="card-body">
                    <a href="<?= base_url(); ?>"><i class="pb-3 fas fa-home"></i></i></a>
                        <!-- Default form register -->
                        <?= form_open('','class="text-center p-xl-5 p-lg-5 p-md-1 p-sm-1"'); ?>
                        <!-- <form class="text-center p-5" action="#!"> -->
                        <p class="h3 mb-4">Login</p>

                        <?php if( session()->getTempdata('error')) : ?>
                            <div class="alert alert-danger" role="alert">
                            <?= session()->getTempdata('error'); ?>
                            </div>
                        <?php endif; ?>

                        <input type="email" id="email" name="email" class="form-control mb-4" placeholder="E-mail">

                        <!-- password -->
                        <input type="password" id="password" name="password" class="form-control mb-4" placeholder="password" aria-describedby="password">

                        <button class="btn btn-info my-4 btn-block m-0" type="submit" name="login" value="Login">LOGIN</button>
                        <p>Not a member?  <a href="<?= base_url(); ?>/register" class="mx-2" role="button"> Register</a></p>

                        <hr>

                        <!-- Social register -->
                        <p>or Login with:</p>
                        <?php if (isset($loginButton)) : ?>
                        <a href="<?= $loginButton; ?>" class="mx-2" role="button"><i class="fab fa-google"></i></a>
                        <?php endif; ?>
                        <?php if (isset($loginfacebookButton)) : ?>
                        <a href="<?= $loginfacebookButton; ?>" class="mx-2" role="button"><i class="fab fa-facebook-f"></i></a>
                        <?php endif; ?>

                        <!-- </form> -->
                        <?= form_close(); ?>
                        <!-- Default form register -->
                    </div>
                </div>
                <!-- Card Primary -->
            </div>
        </div>
        <!-- Grid column -->
        </div>
        <!-- Grid row -->

    </section>
    <!-- Section: Classic admin cards -->

<?= $this->endSection(); ?>
