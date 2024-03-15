<?php include 'template/header.php'; ?>
<?php include 'template/topnavbar.php'; ?>
<?php include 'template/sidebar.php'; ?>
<?php require 'controller/koneksi.php'; ?>
<?php $db = new Db(); ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ubah Data barang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="gudang.php">Gudang</a></li>
                        <li class="breadcrumb-item active">Ubah Data</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="container">
                <div class="row my-2 text-dark">
                    <div class="col-md">
                        <form action="proses.php?aksi=update" method="post">
                            <?php
                            foreach ($db->edit($_GET['id']) as $d) {
                            ?>
                                <div class="mb-3">
                                    <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
                                    <label for="kode_barang" class="form-label">Kode Barang</label>
                                    <input type="text" class="form-control form-control-md w-50" name="kode_barang" value="<?php echo $d['kode_barang'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="nama_barang" class="form-label">Nama Barang</label>
                                    <input type="text" class="form-control w-50" name="nama_barang" value="<?php echo $d['nama_barang'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_barang" class="form-label">Jenis Barang</label>
                                    <select class="form-select w-50" name="jenis_barang" value="<?php echo $d['jenis_barang'] ?>">
                                        <option value="cair" <?php if ($d['jenis_barang'] == 'cair') {
                                                                    echo "selected";
                                                                } ?>>
                                            Cair</option>
                                        <option value="padat" <?php if ($d['jenis_barang'] == 'padat') {
                                                                    echo "selected";
                                                                } ?>>
                                            Padat</option>
                                        <option value="gas" <?php if ($d['jenis_barang'] == 'gas') {
                                                                echo "selected";
                                                            } ?>>Gas
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="text" class="form-control w-50" name="harga" value="<?php echo $d['harga'] ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="stok" class="form-label">Stok</label>
                                    <input type="text" class="form-control w-50" name="stok" value="<?php echo $d['stok'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="catatan" class="form-label">Catatan</label>
                                    <input type="text" class="form-control w-50" name="catatan" value="<?php echo $d['catatan'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="tgl_update" class="form-label">Tanggal Update</label>
                                    <input type="date" class="form-control w-50" name="tgl_update" value="<?php echo $d['tgl_update'] ?>">
                                </div>

                            <?php
                            } ?>

                            <button type="submit" class="btn btn-success text-light" name="simpan">Simpan</button>

                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>


<?php include 'template/footer.php'; ?>