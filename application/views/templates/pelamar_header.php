<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url(); ?>assets/css/style_pelamar.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Restaurantly - v1.2.1
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- sweetalert2 -->
    <?php if ($this->session->flashdata('flash')) : ?>
        <div id="flashdata" data-title="<?= $this->session->flashdata('flash')['title']; ?>" data-text="<?= $this->session->flashdata('flash')['text']; ?>" data-icon="<?= $this->session->flashdata('flash')['icon']; ?>"></div>
    <?php unset($_SESSION['flash']);
    endif; ?>
    <!-- ======= Top Bar ======= -->
    <!-- <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container d-flex">
            <div class="contact-info mr-auto">
                <i class="icofont-phone"></i> +62 881 000 222
                <span class="d-none d-lg-inline-block"><i class="icofont-clock-time icofont-rotate-180"></i> Senin-Jumat: 09:00 - 17:00 WIB</span>
            </div>
        </div>
    </div> -->

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"><a href="<?= base_url('pelamar/index'); ?>">Pusdiklat</a></h1>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="<?= base_url('pelamar/index'); ?>">Beranda</a></li>
                    <li><a href="<?= base_url('pelamar/index') . "#why-us"; ?>">Panduan</a></li>
                    <li><a href="<?= base_url('pelamar/index') . "#specials"; ?>">Daftar Unit</a></li>

                    <li>
                        <div class="dropdown">
                            <a id="profileDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <span class="mr-1"><?= $user['nama_pelamar']; ?></span>
                                <img src="<?= base_url('foto_profil/') . $user['foto_profil']; ?>" style="height: 1.7rem;" class="img-thumbnail rounded-circle"> -->
                            </a>

                            <div class="dropdown-menu" aria-labelledby="profileDropdown">
                                <a style="color: black;" class="dropdown-item akun-dropdown" href="<?= base_url('pelamar/profile'); ?>">Profil</a>
                                <div class="dropdown-divider"></div>
                                <a style="color: black;" class="dropdown-item akun-dropdown" href="<?= base_url('pelamar/kegiatan'); ?>">Kegiatanku</a>
                                <div class="dropdown-divider"></div>
                                <a style="color: black;" class="dropdown-item logout akun-dropdown" href="<?= base_url('auth/logout'); ?>">Keluar</a>
                            </div>
                        </div>
                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->