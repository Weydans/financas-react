<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Finanças</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= viewPath('adminLTE/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= viewPath('adminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= viewPath('adminLTE/dist/css/adminlte.css') ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <meta name="baseUrl" content="<?= route('') ?>">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
    </ul>
  <!-- /.navbar -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a href="<?= route('') ?>" class="btn btn-sm btn-outline-danger">
          <i class="fa fa-sign-out-alt"></i>
          Sair
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-3">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="" alt="" class="brand-image img-circle elevation-3"style="opacity: .8">
      <span class="brand-text font-weight-light"><b>Finanças</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= viewPath('adminLTE/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Weydans Barros</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= route('home') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= route('receita') ?>" class="nav-link">
              <i class="nav-icon fas fa-piggy-bank"></i>
              <p>
                Receitas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= route('despesa') ?>" class="nav-link">
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>
                Despesas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= route('movimentacao') ?>" class="nav-link">
              <i class="nav-icon fas fa-hand-holding-usd"></i>
              <p>
                Movimentações
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Relatórios
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">
              <small><i class="nav-icon fas fa-<?= $pageIcon ?> mr-2"></i></small><?= $pageTitle ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <div class="container mt-3 mb-0">
        <div class="row">
          <div class="col-12">
            <?= ($msg ?? '') ?>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->
