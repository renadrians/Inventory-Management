<?php include 'template/header.php'; ?>
<?php include 'template/topnavbar.php'; ?>
<?php include 'template/sidebar.php'; ?>
<?php require 'controller/koneksi.php'; ?>
<?php $db = new Db(); ?>

<?php
$select = new Select();
session_start();
if (!empty($_SESSION["id"])) {
  $user = $select->selectUserById($_SESSION["id"]);
} else {
  header("Location: login.php");
}

?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-3">
        <div class="col-sm-6 mb-4">
          <h1 class="m-0">DATA BARANG</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Gudang</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->

      <div class="row my-2">
        <div class="col-md">
          <a href="input.php" class="btn btn-primary"> <i class="fas fa-plus"></i> Tambah Data</a>
          <a href="export.php" class="btn btn-success"> <i class="bi bi-file-earmark-spreadsheet-fill"></i> Export CSV</a>
        </div>
      </div>

      <div class="row my-3">
        <div class="col-md">
          <table id="data" class="table table-striped table-hover text-center " style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>kode Barang</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Tanggal update</th>
                <th>Catatan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($db->tampil_data() as $x) {
              ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $x['kode_barang']; ?></td>
                  <td><?php echo $x['nama_barang']; ?></td>
                  <td><?php echo $x['jenis_barang']; ?></td>
                  <td><?php echo $x['harga']; ?></td>
                  <td><?php echo $x['stok']; ?></td>
                  <td><?php echo $x['tgl_update']; ?></td>
                  <td><?php echo $x['catatan']; ?></td>
                  <td>
                    <a href="edit.php?id=<?php echo $x['id']; ?>&aksi=edit" class="btn btn-success btn-sm" style="font-weight: 600;"><i class=" fas fa-edit"></i></a>
                    <a href="proses.php?id=<?php echo $x['id']; ?>&aksi=hapus" class="btn btn-danger btn-sm" style="font-weight: 600;"><i class=" fas fa-trash"></i></a>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>

          </table>
        </div>
      </div>

    </div>
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
</div>


<?php include 'template/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

<script>
  $(document).ready(function() {
    $('#data').DataTable();
  });
</script>