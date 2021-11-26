<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- boostrap -->
  <link rel="stylesheet" href="<?= base_url('assets/bootstrap-4.6.1/') ?>css/bootstrap.min.css">
  <title><?= $tittle ?></title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="#">HI USER</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('admin') ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/pembelian') ?>">Pembelian</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/penjualan') ?>">Penjualan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout') ?>">Logout</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>