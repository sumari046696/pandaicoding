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
<body>
    <!-- Main Navigation -->
    <!-- Main layout -->
    <main class="my-5">
        <div class="container my-5">

            <?= $this->renderSection('content'); ?>

        </div>
    </main>
    <!-- Main layout -->
    <!-- Footer -->
    <footer class="page-footer pt-0 mt-5 ">

        <!-- Copyright -->
        <div class="py-3 text-center">
        <div class="container-fluid text-body">
            © 2020 Copyright: <a href="https://pandaicoding.com" target="_blank" class="text-body"> pandaicoding.com <p>Environment: <?= ENVIRONMENT ?></p></a>
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