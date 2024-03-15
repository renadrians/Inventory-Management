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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="container mt-4">
          <div class="row my-2">
            <div class="col-md">
              <h3 class="text-center fw-bold text-dark ">DATA BARANG</h3>
              <hr>
            </div>
          </div>
          <div class="row my-3">
            <div class="col-md">
              <table id="data" class="table table-striped table-hover text-center" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jenis Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Tanggal update</th>
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
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <?php include 'template/footer.php'; ?>