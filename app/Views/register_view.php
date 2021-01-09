<?php $page_session = \Config\Services::session(); ?>
<?= $this->extend('layout/template_loginandregister') ?>
<?= $this->section('content'); ?>

    <!-- Section: Classic admin cards -->
    <section>

        <!-- Grid row -->
        <div class="row">

        <!-- Grid column -->
        <div class="col-12 mb-xl-0 mb-4 d-flex justify-content-center">
            <div class="col-lg-6 col-xl-6 col-sm-12 p-sm-0 p-md-0">
                <!-- Card Primary -->
                <div class="card">
                    <div class="card-body">
                    <a href="<?= base_url(); ?>"><i class="pb-3 fas fa-home"></i></i></a>
                        <!-- Default form register -->
                        <?= form_open('','class="text-center p-sm-1 p-md-1 p-lg-5 p-xs-5 needs-validation" novalidate'); ?>
                        <!-- <form class="text-center p-3" action="#!"> -->

                        <p class="h3 mb-4">Register</p>

                        <?php if($page_session->getTempdata('success')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= $page_session->getTempdata('success'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if($page_session->getTempdata('error')) : ?>
                            <div class="alert alert-danger" role="alert">
                            <?= $page_session->getTempdata('error'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="text-left mb-4">
                            <input type="texx" id="firstname" name="firstname" class="form-control" placeholder="First Name" value="<?= old('firstname') ?>" name" autocomplete="off">
                            <span class="text-danger"><?= $validation->showError('firstname'); ?></span>
                        </div>
                        <div class="text-left mb-4">
                            <input type="texx" id="lastlame" name="lastlame" class="form-control" placeholder="Last name" autocomplete="off">
                            <span class="text-danger"><?= $validation->showError('lastlame'); ?></span>
                        </div>

                        <div class="text-left mb-4">
                            <input type="texx" id="usermame" name="usermame" class="form-control" placeholder="User Name" autocomplete="off">
                            <span class="text-danger"><?= $validation->showError('usermame'); ?></span>
                        </div>
                        <div class="text-left mb-4">
                            <input type="email" id="email" name="email" class="form-control" placeholder="E-mail">
                            <span class="text-danger"><?= $validation->showError('email'); ?></span>
                        </div>
                        <div class="text-left mb-4">
                            <!-- Password -->
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" aria-describedby="Password">
                            <span class="text-danger"><?= $validation->showError('password'); ?></span>
                        </div>
                        <div class="text-left mb-4">
                            <input type="password" id="cpassword" name="cpassword" class="form-control" placeholder="Password" aria-describedby="Confirm Password">
                            <span class="text-danger"><?= $validation->showError('cpassword'); ?></span>
                        </div>
                        <div class="text-left mb-4">
                            <!-- Phone number -->
                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone number" aria-describedby="FormPhoneHelpBlock">
                            <span class="text-danger"><?= $validation->showError('phone'); ?></span>
                        </div>
                        <!-- Sign up button -->
                        <button class="btn btn-info my-4 btn-block m-0" type="submit" name="register" value="Register">Register</button>
                        <p>Redy Account?  <a href="<?= base_url(); ?>/login" class="mx-2" role="button"> Login</a></p>
                        <!-- Social register -->
                        <hr>
                        <p>or Register with:</p>

                        <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="mx-2" role="button"><i class="fab fa-google"></i></a>

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
