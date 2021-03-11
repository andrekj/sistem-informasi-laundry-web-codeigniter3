<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bunga Laundry</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="<?= base_url('assets/') ?>img/59523.jpg" rel="icon">
    <link href="<?= base_url('assets/frontend/') ?>img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="<?= base_url('assets/frontend/') ?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="<?= base_url('assets/frontend/') ?>lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/frontend/') ?>lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/frontend/') ?>lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/frontend/') ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/frontend/') ?>lib/magnific-popup/magnific-popup.css" rel="stylesheet">
    <link href="<?= base_url('assets/frontend/') ?>lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="<?= base_url('assets/frontend/') ?>css/style.css" rel="stylesheet">

    <!-- =======================================================
    Theme Name: Reveal
    Theme URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body id="body">

    <!--==========================
    Top Bar
  ============================-->

    <?php if ($this->session->userdata('role_id') == '4') : ?>
        <section id="topbar" class="d-none d-lg-block">
            <div class="container clearfix">
                <div class="contact-info float-left">
                    <i class="fa fa-user" aria-hidden="true"> <?= $user['nama']; ?></h3></i>
                </div>
                <div class="social-links float-right">
                    <a href="<?= base_url('home/profile'); ?>">Profile</a>&nbsp&nbsp&nbsp
                    <a href="<?= base_url('home/riwayat') ?>">Riwayat Pesanan</a>&nbsp&nbsp&nbsp
                    <a href="<?= base_url('auth/logout'); ?>">Logout</a>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!--==========================
    Header
  ============================-->
    <header id="header">
        <div class="container">

            <div id="logo" class="pull-left">
                <h1><a href="<?= base_url('home'); ?>" class="scrollto">Bunga<span>Laundry</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="<?= base_url('home'); ?>">Home</a></li>
                    <li><a href="<?= base_url('home/pesan'); ?>">Pesan</a></li>
                    <?php if ($this->session->userdata('role_id') == '') : ?>
                        <li><a href="<?= base_url('auth'); ?>">Login</a></li>
                    <?php endif; ?>
                    <?php if ($this->session->userdata('role_id') == '4') : ?>
                        <li><a hidden href="<?= base_url('auth'); ?>">Login</a></li>
                    <?php endif; ?>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </header><!-- #header -->