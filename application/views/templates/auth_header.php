<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style_auth.css">
</head>

<body style="background-color: #5992d9">
    <!-- sweetalert2 -->
    <?php if ($this->session->flashdata('flash')) : ?>
        <div id="flashdata" data-title="<?= $this->session->flashdata('flash')['title']; ?>" data-text="<?= $this->session->flashdata('flash')['text']; ?>" data-icon="<?= $this->session->flashdata('flash')['icon']; ?>"></div>
    <?php unset($_SESSION['flash']);
    endif; ?>

    <div class="main" style="background-color: #5992d9">
