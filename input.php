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

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
          <div class="container-fluid">
               <div class="row mb-2">
                    <div class="col-sm-6">
                         <h1 class="m-0">Tambah Data barang</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="gudang.php">Gudang</a></li>
                              <li class="breadcrumb-item active">Tambah Data</li>
                         </ol>
                    </div><!-- /.col -->
               </div><!-- /.row -->

               <div class="container">
                    <div class="row my-2 text-dark">
                         <div class="col-md">
                              <form action="proses.php?aksi=tambah" method="post">
                                   <div class="mb-3">
                                        <label for="kode_barang" class="form-label">Kode Barang</label>
                                        <input type="text" class="form-control form-control-md w-50" id="kode_barang" placeholder="Masukkan Kode Barang" name="kode_barang" autocomplete="off" required>
                                   </div>
                                   <div class="mb-3">
                                        <label for="nama_barang" class="form-label">Nama Barang</label>
                                        <input type="text" class="form-control w-50" id="nama_barang" placeholder="Masukkan Nama nama Barang" name="nama_barang" autocomplete="off" required>
                                   </div>
                                   <div class="mb-3">
                                        <label for="jenis_barang" class="form-label">Jenis Barang</label>
                                        <select class="form-select w-50" id="jenis_barang" name="jenis_barang">
                                             <option value="cair">Cair</option>
                                             <option value="padat">Padat</option>
                                             <option value="gas">Gas</option>
                                        </select>
                                   </div>
                                   <div class="mb-3">
                                        <label for="harga" class="form-label">Harga</label>
                                        <input type="text" class="form-control w-50" id="harga" placeholder="Masukan Harga" name="harga" autocomplete="off" required>
                                   </div>
                                   <div class="mb-3">
                                        <label for="stok" class="form-label">Stok</label>
                                        <input type="text" class="form-control w-50" id="stok" placeholder="Masukan Stok" name="stok" autocomplete="off" required>
                                   </div>
                                   <div class="mb-3">
                                        <label for="catatan" class="form-label">Catatan</label>
                                        <input type="text" class="form-control w-50" id="catatan" placeholder="Masukan Catatan" name="catatan" autocomplete="off">
                                   </div>
                                   <div class="mb-3">
                                        <label for="tgl_update" class="form-label">Tanggal Update</label>
                                        <input type="date" class="form-control w-50" id="tgl_update" name="tgl_update" max="01-01-2040" required>
                                   </div>


                                   <button type="submit" class="btn btn-primary text-light" name="simpan">Simpan</button>

                              </form>
                         </div>
                    </div>
               </div>
          </div><!-- /.container-fluid -->
     </div>
     <!-- /.content-header -->
</div>


<?php include 'template/footer.php'; ?>