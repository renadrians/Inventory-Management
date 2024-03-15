<?php
include 'controller/koneksi.php';
$db = new Db();

// Periksa apakah kunci 'aksi' ada dalam $_GET
if(isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];
    if ($aksi == "tambah") {
        $db->input($_POST['kode_barang'], $_POST['nama_barang'], $_POST['jenis_barang'], $_POST['stok'], $_POST['harga'], $_POST['catatan'], $_POST['tgl_update']);
        header("location:gudang.php");
    } elseif ($aksi == "hapus") {
        $db->hapus($_GET['id']);
        header("location:gudang.php");
    } elseif ($aksi == "update") {
        $db->update($_POST['id'], $_POST['kode_barang'], $_POST['nama_barang'], $_POST['jenis_barang'], $_POST['stok'], $_POST['harga'], $_POST['catatan'], $_POST['tgl_update']);
        header("location:gudang.php");
    }
} else {
    // Tindakan jika 'aksi' tidak ada
    echo "Aksi tidak ditemukan";
}
?>
