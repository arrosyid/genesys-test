<div class="container-fluid mt-4">
  <form action="" method="post">
    <div class="card">
      <div class="card-header">
        FORM PEMBELIAN
      </div>
      <div class="card-body">
        <div class="form-grup">
          <label for="barang">Barang</label>
          <select class="form-control <?= form_error('barang') != null ? "is-invalid" : "" ?>" name="barang" id="barang">
            <option value="">PILIH BARANG</option>
            <option <?= set_select('barang', 'kaos') ?> value="">kaos</option>
          </select>
          <?= form_error('barang', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-grup">
          <label for="stok">Jumlah Item</label>
          <input type="text" class="form-control" name="stok" id="stok" placeholder="Isi Jumlah Item">
          <?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
      </div>
      <div class="card-footer text-muted">
        <input class="btn btn-primary btn-block" type="submit" value="LOGIN" name="submit">
      </div>
    </div>
  </form>
</div>