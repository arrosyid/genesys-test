<div class="card card-primary">
  <!-- /.card-header -->
  <div class="card-header">
    <h3 class="card-title">Daftar Kelas</h3>
  </div>
  <div class="card-body">
    <?= $this->session->flashdata('message'); ?>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Barang</th>
          <th>Harga Satuan</th>
          <th>Stok Barang</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($inventory == null) {
          echo '<tr><td colspan="5">Data Tidak Di Temukan</td></tr>';
        } else {
          $i = 1; ?>
          <?php foreach ($inventory as $I) : ?>
            <tr>
              <td><?= $i; ?></td>
              <td><?= $I['nama'] ?></td>
              <td><?= $I['harga'] ?></td>
              <td><?= $I['stok'] ?></td>
              <td>
                <a href="" data-toggle="modal" data-target="#editKelas" id="<?= $I['inventory_id'] ?>" class="btn btn-success view-data">edit</a>
                <a href="#" data-url="<?= base_url('Delete/Kelas/') . $I['inventory_id'] ?>" class="delete-daftar-kelas btn btn-danger">hapus</a>
              </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach;
        }
        ?>
      </tbody>
      <tfoot>
        <tr>
          <th>No</th>
          <th>Nama Barang</th>
          <th>Harga Satuan</th>
          <th>Stok Barang</th>
          <th>Action</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card-body -->