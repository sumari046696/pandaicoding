<?= $this->extend('guest/layout/template') ?>
<?= $this->section('content'); ?>

      <!-- Section: Classic admin cards -->
      <section class="pb-3">
        <?php
          if (session()->getFlashdata('pesan')) {
            echo '<div class="alert alert-success" role="alert">'.session()->getFlashdata('pesan').'</div>';
          }
        ?>
        <!-- Grid row -->
        <div class="row">

          <!-- Grid column -->
          <?php foreach ($barang as $value) { ?>
            <div class="col-lg-3 col-md-6 mb-4">

            <?php 
            echo form_open('home/add_cart');
            echo form_hidden('id', $value['id_barang']);
            echo form_hidden('price', $value['harga']);
            echo form_hidden('name', $value['nama_barang']);
            echo form_hidden('gambar', $value['gambar']);
            echo form_hidden('berat', $value['berat']);
            ?>
              <!-- Card -->
              <div class="card card-ecommerce">

                <!-- Card image -->
                <div class="view overlay">

                  <img src="<?= base_url('public/assets/images_barang/'.$value['gambar']); ?>" class="w-100  img-fluid" alt="">

                  <a>

                    <div class="mask rgba-white-slight waves-effect waves-light"></div>

                  </a>

                </div>
                <!-- Card image -->

                <!-- Card content -->
                <div class="card-body">

                  <!-- Category & Title -->
                  <h5 class="card-title mb-1"><strong><a href="" class="dark-grey-text"><?= $value['nama_barang'];?></a></strong></h5>
                  <span class="badge badge-danger mb-2">bestseller</span>
                  <span class="badge badge-secondary mb-2"><?= $value['berat']; ?> KG</span>

                  <!-- Rating -->
                  <ul class="rating">

                    <li><i class="fas fa-star blue-text"></i></li>

                    <li><i class="fas fa-star blue-text"></i></li>

                    <li><i class="fas fa-star blue-text"></i></li>

                    <li><i class="fas fa-star blue-text"></i></li>

                    <li><i class="fas fa-star blue-text"></i></li>

                  </ul>

                  <!-- Card footer -->
                  <div class="card-footer pb-0">

                    <div class="row mb-0">

                      <span class="float-left"><strong><?= number_to_currency($value['harga'], 'IDR');?></strong></span>

                      <span class="float-right">

                        <button type="submit" class="p-0 btn btn-sm ml-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Cart"><i class="fas fa-shopping-cart p-0 fa-2x"></i></button>

                      </span>

                    </div>

                  </div>

                </div>
                <!-- Card content -->

              </div>
              <!-- Card -->

              </div>
            <?= form_close(); ?>
          <?php } ?>
		      <!-- Grid column -->
		  </div>
        <!-- Grid row -->

      </section>
      <!-- Section: Classic admin cards -->

<?= $this->endSection(); ?>