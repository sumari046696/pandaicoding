<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?= $title; ?></title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="<?= base_url();?>/vendor/mdb/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?= base_url();?>/vendor/mdb/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
</head>
<body class="fixed-sn white-skin">
    <!-- Main Navigation -->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">

        <!-- Breadcrumb -->
          <div class="breadcrumb-dn mr-auto">
              <p>bosCoding</p>
          </div>

          <div class="breadcrumb-dn" style="padding-right: 15rem;">
              <!-- Navbar links -->
              <ul class="nav navbar-nav nav-flex-icons">
              <!-- Dropdown -->
              <li class="nav-item dropdown notifications-nav">
                  <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="badge red"><?= $cart->totalItems(); ?></span> <i class="fas fa-shopping-cart"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-primary mr-auto" aria-labelledby="navbarDropdownMenuLink">
                  <?php
                  $keranjang = $cart->contents();
                  if(empty($keranjang)) {
                    echo '<a class="dropdown-item" href="#"><i class="far fa-money-bill-alt" aria-hidden="true"></i><span> Tambah Barang</span></a>';
                  } else { ?>
                    <?php foreach ($keranjang as $value) { ?>
                      <a class="dropdown-item" href="#">
                        <img src="<?= base_url('public/assets/images_barang/'.$value['options']['gambar']); ?>"  width="15%" alt="" srcset="">
                        <span> <?= $value['name'];?></span>
                        <span> Qty : <?= $value['qty']; ?></span>
                        <span> Price : <?= $value['price'];?></span>
                        <span> Subtotal : <?= $value['subtotal'];?></span>
                      </a>
                    <?php } ?>
                    <a class="dropdown-item" href="<?= base_url(); ?>/register">Total : <?= number_to_currency($cart->total(), 'IDR'); ?></a>
                  <?php } ?>
                  </div>
              </li>
              <?php if((session()->has('logged_user')||session()->has('google_user')||session()->has('facebook_user'))) :?>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block"><?= $this->renderSection('page_title'); ?> </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                      <a class="dropdown-item" href="<?= base_url();?>/user">My Account</a>
                      <a class="dropdown-item" href="<?= base_url();?>/user/login_activity">Login Actifity</a>
                      <a class="dropdown-item" href="<?= base_url();?>/user/logout">Log Out</a>
                  </div>
              </li>
              <?php else:?>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                      <a class="dropdown-item" href="<?= base_url(); ?>/register">Register</a>
                      <a class="dropdown-item" href="<?= base_url(); ?>/login">Login</a>
                  </div>
              </li>
              <?php endif;?>

              </ul>
              <!-- Navbar links -->
          </div>
        </nav>
        <!-- Navbar -->

        <!-- Fixed button -->
        <div class="fixed-action-btn clearfix d-none d-xl-block" style="bottom: 45px; right: 24px;">

        <a class="btn-floating btn-lg red">
            <i class="fas fa-pencil-alt"></i>
        </a>

        <ul class="list-unstyled">
            <li><a class="btn-floating red"><i class="fas fa-star"></i></a></li>
            <li><a class="btn-floating yellow darken-1"><i class="fas fa-user"></i></a></li>
            <li><a class="btn-floating green"><i class="fas fa-envelope"></i></a></li>
            <li><a class="btn-floating blue"><i class="fas fa-shopping-cart"></i></a></li>
        </ul>

        </div>
        <!-- Fixed button -->

    </header>
    <!-- Main Navigation -->
    <!-- Main layout -->
    <main>
        <div class="container">

            <?= $this->renderSection('content'); ?>

        </div>
    </main>
    <!-- Main layout -->
    <!-- Footer -->
    <footer class="page-footer pt-0 mt-5 pl-0 rgba-stylish-light">

        <!-- Copyright -->
        <div class="footer-copyright py-3 text-center">
        <div class="container-fluid">
            © 2020 Copyright: <a href="https://pandaicoding.com" target="_blank"> pandaicoding.com <p>Environment: <?= ENVIRONMENT ?></p></a>
        </div>
        </div>

    </footer>
    <!-- Footer -->
<!-- SCRIPTS -->
<!-- JQuery -->
<script src="<?= base_url();?>/vendor/mdb/js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="<?= base_url();?>/vendor/mdb/js/bootstrap.js"></script>

</script>

</body>

</html>
