<div class="container mt-4">
  <form action="" method="post">
    <div class="card">
      <div class="card-header">
        SILAHKAN LOGIN
      </div>
      <div class="card-body">
        <?= $this->session->flashdata('message') ?>
        <div class="form-grup">
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" id="username" placeholder="Isi Username" value="<?= set_value('username') ?>">
          <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-grup">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Isi Password" value="<?= set_value('password') ?>">
          <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
      </div>
      <p class="ml-4">Belum punya akun? <a href="<?= base_url('auth/registrasi') ?>">daftar di sini</a></pc>
      <div class="card-footer text-muted">
        <input class="btn btn-primary btn-block" type="submit" value="LOGIN" name="submit">
      </div>
    </div>
  </form>
</div>