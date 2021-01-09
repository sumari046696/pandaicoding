<?= $this->extend('layout/template') ?>

<?= $this->section('page_title');?>
  <span><?= ucfirst($userdata->firstname); ?></span>
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
              <div class="card-body">
              <table id="paginationNumbers" class="table" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Id</th>
                        <th class="th-sm">Login Time</th>
                        <th class="th-sm">Logout Time</th>
                        <th class="th-sm">User Agent</th>
                        <th class="th-sm">IP Address</th>
                    </tr>
                </thead>
                <?php if(count($login_info) > 0) : ?>
                <tbody>
                    <?php foreach ($login_info as $info) : ?>
                    <tr>
                        <td><?= $info->id;?></td>
                        <td><?= $info->login_time;?></td>
                        <td><?= $info->logout_time;?></td>
                        <td><?= $info->agent;?></td>
                        <td><?= $info->ip;?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>                    
                <?php else : ?>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
                <?php endif; ?>
                </table>
              </div>
            </div>
            <!-- Card Primary -->

          </div>
		  <!-- Grid column -->
		  </div>
        <!-- Grid row -->

      </section>
      <!-- Section: Classic admin cards -->

      <script>
        $(document).ready(function () {
            //Pagination numbers
            $('#paginationNumbers').DataTable({
                "pagingType": "numbers"
            });
        });      
      </script>

<?= $this->endSection(); ?>