<?php

require 'controller/koneksi.php';
$db = new Db();

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Gudang.xls");
?>

<h2>LAPORAN DATA GUDANG</h2>

<table border="1">
    <tr>
        <th>No</th>
        <th>kode Barang</th>
        <th>Nama Barang</th>
        <th>Jenis Barang</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Tanggal update</th>
        <th>Catatan</th>
    </tr>
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
                </tr>
              <?php
              }
              ?>

</table>