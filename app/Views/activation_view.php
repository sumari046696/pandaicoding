<?php $page_session = \Config\Services::session(); ?>
<?= $this->extend('layout/template') ?>
<?= $this->section('content'); ?>

    <!-- Section: Classic admin cards -->
    <section class="pb-3">

        <!-- Grid row -->
        <div class="row">

        <!-- Grid column -->
        <div class="col-xl-12 col-md-12 mb-xl-0 mb-4">
            <!-- Card Primary -->
            <div class="card">
                <div class="card-body">
                    
                    <?php if(isset($success)) : ?>
                        <div class="alert alert-success" role="alert">
                        <?= $success; ?>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($error)) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $error; ?>
                        </div>
                    <?php endif; ?>
                    
                </div>
            </div>
            <!-- Card Primary -->
        </div>
        <!-- Grid column -->
        </div>
        <!-- Grid row -->

    </section>
    <!-- Section: Classic admin cards -->

<?= $this->endSection(); ?>