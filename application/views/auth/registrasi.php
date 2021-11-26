<div class="container mt-4">
  <form action="" method="post">
    <div class="card">
      <div class="card-header">
        SILAHKAN REGISTRASI
      </div>
      <div class="card-body">
        <div class="form-grup">
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" id="username" placeholder="Isi Username" value="<?= set_value('username') ?>">
          <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-grup mt-2">
          <label for="password1">Password</label>
          <input type="password" class="form-control" name="password1" id="password1" placeholder="Isi Password" value="<?= set_value('password') ?>">
          <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-grup mt-2">
          <label for="password2">Konfirmasi Password</label>
          <input type="password" class="form-control" name="password2" id="password2" placeholder="Isi Password" value="<?= set_value('password') ?>">
          <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
      </div>
      <div class="card-footer text-muted">
        <input class="btn btn-primary btn-block" type="submit" value="REGISTRASI" name="submit">
      </div>
    </div>
  </form>
</div>