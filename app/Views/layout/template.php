<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>PANDAI CODING | EDUKASI ONLINE FULL STACK DEVELOPER</title>
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
        <!-- Sidebar navigation -->
        <div id="slide-out" class="side-nav sn-bg-4 fixed">
            <ul class="custom-scrollbar">
                <!-- Logo -->
                <li class="logo-sn waves-effect py-3">
                <div class="text-center">
                    <a href="<?= base_url(); ?>" class="pl-0"><img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png"></a>
                </div>
                </li>
                <!-- Search Form -->
                <li>
                <form class="search-form" role="search">
                    <div class="md-form mt-0 waves-light">
                    <input type="text" class="form-control py-2" placeholder="Search">
                    </div>
                </form>
                </li>
                <!-- Side navigation links -->
                <li>                
                <ul class="collapsible collapsible-accordion">
                    <li>
                    <a href="<?= base_url(); ?>/dashboard" class="collapsible-header waves-effect"><i class="w-fa fas fa-tachometer-alt"></i>Dashboards</a>
                    </li>
                    <li>
                    <a class="collapsible-header waves-effect arrow-r">
                        <i class="w-fa fas fa-bars"></i>Menu<i class="fas fa-angle-down rotate-icon"></i>
                    </a>
                    <div class="collapsible-body">
                        <ul>
                        <li>
                            <a href="../dashboards/v-1.html" class="waves-effect">Version 1</a>
                        </li>
                        <li>
                            <a href="../dashboards/v-2.html" class="waves-effect">Version 2</a>
                        </li>
                        </ul>
                    </div>
                    </li>
                    <!-- Simple link -->
                    <li>
                    <a href="../alerts/alerts.html" class="collapsible-header waves-effect"><i class="w-fa far fa-bell"></i>Alerts</a>
                    </li>
                </ul>
                </li>
                <!-- Side navigation links -->
            </ul>
            <div class="sidenav-bg mask-strong"></div>
        </div>
        <!-- Sidebar navigation -->

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">

        <!-- SideNav slide-out button -->
        <div class="float-left">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
        </div>

        <!-- Breadcrumb -->
        <div class="breadcrumb-dn mr-auto">
            <p>Dashboard v.1</p>
        </div>

        <div class="d-flex change-mode">
            <div class="ml-auto mb-0 mr-3 change-mode-wrapper">
                <button class="btn btn-outline-black btn-sm" id="dark-mode">Change Mode</button>
            </div>
            <!-- Navbar links -->
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
            <!-- Dropdown -->
            <li class="nav-item dropdown notifications-nav">
                <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="badge red">3</span> <i class="fas fa-bell"></i>
                <span class="d-none d-md-inline-block">Notifications</span>
                </a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">
                    <i class="far fa-money-bill-alt mr-2" aria-hidden="true"></i>
                    <span>New order received</span>
                    <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 13 min</span>
                </a>
                <a class="dropdown-item" href="#">
                    <i class="far fa-money-bill-alt mr-2" aria-hidden="true"></i>
                    <span>New order received</span>
                    <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 33 min</span>
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-chart-line mr-2" aria-hidden="true"></i>
                    <span>Your campaign is about to end</span>
                    <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 53 min</span>
                </a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-effect"><i class="fas fa-envelope"></i> <span
                    class="clearfix d-none d-sm-inline-block">Contact</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-effect"><i class="far fa-comments"></i> <span
                    class="clearfix d-none d-sm-inline-block">Support</span></a>
            </li>
            <?php if((session()->has('logged_user')||session()->has('google_user')||session()->has('facebook_user'))) :?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown"
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
                <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">Profile</span>
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
        <div class="container-fluid">

            <?= $this->renderSection('content'); ?>

        </div>
    </main>
    <!-- Main layout -->
    <!-- Footer -->
    <footer class="page-footer pt-0 mt-5 rgba-stylish-light">

        <!-- Copyright -->
        <div class="footer-copyright py-3 text-center">
        <div class="container-fluid">
            © 2020 Copyright: <a href="https://pandaicoding.com" target="_blank"> pandaicoding.com | <p>Environment: <?= ENVIRONMENT ?></p></a>
        </div>
        </div>

    </footer>
    <!-- Footer -->
<!-- SCRIPTS -->
<!-- JQuery -->
<script src="<?= base_url();?>/vendor/mdb/js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="<?= base_url();?>/vendor/mdb/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="<?= base_url();?>/vendor/mdb/js/bootstrap.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="<?= base_url();?>/vendor/mdb/js/mdb.min.js"></script>

<!-- Initializations -->
<script>
// SideNav Initialization
$(".button-collapse").sideNav();

var container = document.querySelector('.custom-scrollbar');
var ps = new PerfectScrollbar(container, {
  wheelSpeed: 2,
  wheelPropagation: true,
  minScrollbarLength: 20
});

// Data Picker Initialization
$('.datepicker').pickadate();

// Material Select Initialization
$(document).ready(function () {
  $('.mdb-select').material_select();
});

// Tooltips Initialization
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

</script>

<!-- Charts -->
<script>
// Small chart
$(function () {
  $('.min-chart#chart-sales').easyPieChart({
    barColor: "#FF5252",
    onStep: function (from, to, percent) {
      $(this.el).find('.percent').text(Math.round(percent));
    }
  });
});

$(function () {
  $('#dark-mode').on('click', function (e) {

    e.preventDefault();
    $('h4, button').not('.check').toggleClass('dark-grey-text text-white');
    $('.list-panel a').toggleClass('dark-grey-text');

    $('footer, .card').toggleClass('dark-card-admin');
    $('body, .navbar').toggleClass('white-skin navy-blue-skin');
    $(this).toggleClass('white text-dark btn-outline-black');
    $('body').toggleClass('dark-bg-admin');
    $('h6, .card, p, td, th, i, li a, h4, input, label').not(
      '#slide-out i, #slide-out a, .dropdown-item i, .dropdown-item').toggleClass('text-white');
    $('.btn-dash').toggleClass('grey blue').toggleClass('lighten-3 darken-3');
    $('.gradient-card-header').toggleClass('white black lighten-4');
    $('.list-panel a').toggleClass('navy-blue-bg-a text-white').toggleClass('list-group-border');

  });
});

</script>

</body>

</html>