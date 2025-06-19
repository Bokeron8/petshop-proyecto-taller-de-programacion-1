<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $titulo ?? 'Default Title' ?></title>
  <!-- Enlaces locales a los archivos CSS de Bootstrap -->
  <link href=<?php echo base_url("assets/css/bootstrap.min.css") ?> rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url("/assets/css/miestilo.css") ?>">
  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    -->
  <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/animate.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/aos.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/animista.css') ?>" />
  <link rel="icon" type="image/x-icon" href="<?= base_url("assets/img/icon.png") ?>">

  <link rel="preload" href="<?= base_url('assets/fonts/catpaw.otf') ?>" as="font" type="font/otf"
    crossorigin="anonymous">
  <link rel="preload" href="<?= base_url('assets/fonts/puppy.ttf') ?>" as="font" type="font/ttf"
    crossorigin="anonymous">
  <link rel="preload" href="<?= base_url('assets/fonts/honey.woff2') ?>" as="font" type="font/woff2"
    crossorigin="anonymous">

</head>

<body class="min-vh-100 d-flex flex-column">