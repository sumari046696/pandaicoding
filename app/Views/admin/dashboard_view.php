<?= $this->extend('layout/template') ?>

<?= $this->section('page_title');?>
<?php if (session()->has('google_user')) : $uinfo = session()->get('google_user'); ?>
  <span><?= $uinfo['first_name']; ?> <?= $uinfo['last_name']; ?></span>
<?php elseif(session()->has('facebook_user')) : $uinfo = session()->get('facebook_user'); ?>
  <span><?= $uinfo['first_name']; ?> <?= $uinfo['last_name']; ?></span>
<?php else: ?>
  <span><?= ucfirst($userdata->firstname); ?></span>
<?php endif; ?>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

      <!-- Section: Classic admin cards -->
      <section class="pb-3">

        <!-- Grid row -->
        <div class="row">

          <!-- Grid column -->
          <div class="col-xl-12 col-md-6 mb-xl-0 mb-4">

            <!-- Card Primary -->
            <div class="card classic-admin-card">
            <?php if (session()->has('google_user')) : $uinfo = session()->get('google_user'); ?>
              <div class="card-body text-body">
               
                <img class="mb-2" src="<?= $uinfo['profile_pic']; ?>" width="200" alt="" srcset="">
                <p>Name : <?= $uinfo['first_name']; ?> <?= $uinfo['last_name']; ?></p>
                <p>Email : <?= $uinfo['email']; ?></p>

              </div>
            <?php elseif(session()->has('facebook_user')) : $uinfo = session()->get('facebook_user'); ?>
              <div class="card-body text-body">
               
               <img class="mb-2" src="<?= $uinfo['profile_pic']; ?>" width="200" alt="" srcset="">
               <p>Name : <?= $uinfo['first_name']; ?> <?= $uinfo['last_name']; ?></p>
               <p>Email : <?= $uinfo['email']; ?></p>

             </div>
            <?php else: ?>
              <div class="card-body text-body">
                <?php if($userdata->profile_pic != ''):?>
                  <img class="mb-2" src="<?= base_url();?>/public/assets/images/" width="200" alt="" srcset="">
                <?php else:?>
                  <img class="mb-2" src="<?= base_url();?>/public/assets/images/account.png" width="200" alt="" srcset="">
                <?php endif;?>

                <h1>Welcom, <?= ucfirst($userdata->firstname); ?></h1>
                <h5>Phone : <?= ucfirst($userdata->phone); ?></h5>                
                <h5>Email : <?= ucfirst($userdata->email); ?></h5>                
                <hr>
                <a href="<?= base_url();?>/user/logout"><button type="button" class="btn btn-light-blue">Logout</button></a>
              </div>
              <?php endif; ?>
            </div>
            <!-- Card Primary -->

          </div>
		  <!-- Grid column -->
		  </div>
        <!-- Grid row -->

      </section>
      <!-- Section: Classic admin cards -->

<?= $this->endSection(); ?>