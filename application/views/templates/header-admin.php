<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Walwal Shopping</title>
  </head>
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/bootstrap/fa/css/font-awesome.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/datatables/datatables.min.css') ?>">

  <script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js') ?>"></script>

  <body>

    <div id="wrapper">

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= base_url() ?>">Walwal Shopping</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
        <li><a href=""><i class=" fa fa-user-circle-o"></i> Admin</a></li>
        <li><a href="#" class='logoutBtn'><i class="fa fa-fw fa-power-off"></i> Log Out</a></li>
        </ul>

        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li><a href="<?= base_url(); ?>admin/orders"><i class="fa fa-shopping-cart"></i> Orders</a></li>
                <li><a href="<?= base_url(); ?>admin/products"><i class="fa fa-shopping-bag"></i> Products</a></li>
                <li><a href="<?= base_url(); ?>admin/reports"><i class="fa fa-file"></i> Reports</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
          <div class="container-fluid">

          <h3><i class="<?= $icon ?>"></i> <?= $title ?></h3><hr>
