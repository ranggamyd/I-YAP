<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>I-Yap - <?= $title ?></title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/toastr/toastr.min.css">
    <link rel="shortcut icon" href="<?= base_url('assets') ?>/img/logo_bkipm2.png">
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets') ?>/img/logo_only.png" />

    <!-- Perpage CSS -->
    <?php if (isset($style['css'])) : ?>
        <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/custom/<?= $style['css'] ?>">
    <?php endif ?>
</head>

<body class="bg-gradient-info vh-100 d-flex justify-content-center align-items-center">