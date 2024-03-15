<?php

class Db
{
     public $host = "localhost";
     public $uname = "root";
     public $pass = "";
     public $db = "management_inventory";

     public $conn;

     function __construct()
     {
          $this->conn = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
     }

     function tampil_data()
     {
          $data = mysqli_query($this->conn, "SELECT * FROM gudang ORDER BY id");
          while ($d = mysqli_fetch_array($data)) {
               $hasil[] = $d;
          }
          return $hasil;
     }

     function input($kode_barang, $nama_barang, $jenis_barang, $stok, $harga, $catatan, $tgl_update)
     {
         mysqli_query($this->conn, "INSERT INTO gudang (kode_barang, nama_barang, jenis_barang, stok, harga, catatan, tgl_update) VALUES ('$kode_barang', '$nama_barang', '$jenis_barang', '$stok', '$harga', '$catatan', '$tgl_update')");
     }
     

     function hapus($id)
     {
          mysqli_query($this->conn, "DELETE FROM gudang WHERE gudang . id='$id'");
     }

     function edit($id)
     {
          $data = mysqli_query($this->conn, "SELECT * FROM gudang WHERE gudang . id='$id'");
          while ($d = mysqli_fetch_array($data)) {
               $hasil[] = $d;
          }
          return $hasil;
     }

     function update($id, $kode_barang, $nama_barang, $jenis_barang, $stok, $harga, $catatan, $tgl_update)
     {
         mysqli_query($this->conn, "UPDATE gudang SET kode_barang='$kode_barang', nama_barang='$nama_barang', jenis_barang='$jenis_barang', stok='$stok', harga='$harga', catatan='$catatan', tgl_update='$tgl_update' WHERE id='$id'");
     }
     

     function jmlhdata()
     {
          $data = mysqli_query($this->conn, "SELECT * FROM gudang ORDER BY id");
          $jumlah_data = mysqli_num_rows($data);

          return $jumlah_data;
     }
}

class Register extends Db
{
     public function registration($username, $email, $password, $confirmpassword)
     {
          $duplicate = mysqli_query($this->conn, "SELECT * FROM user WHERE username = '$username' OR email = '$email'");
          if (mysqli_num_rows($duplicate) > 0) {
               return 10;
               // Username atau email sudah ada
          } else {
               if ($password == $confirmpassword) {
                    $query = "INSERT INTO user VALUES('','$username', '$email', '$password')";
                    mysqli_query($this->conn, $query);
                    return 1;
                    // Regis sukses
               } else {
                    return 100;
                    // Password salah
               }
          }
     }
}

class Login extends Db
{
     public $id;
     public function login($usernameemail, $password)
     {
          $result = mysqli_query($this->conn, "SELECT * FROM user WHERE username = '$usernameemail' OR email = '$usernameemail'");
          $row = mysqli_fetch_assoc($result);

          if (mysqli_num_rows($result) > 0) {
               if ($password == $row["password"]) {
                    $this->id = $row["id"];
                    return 1;
                    // login sukses
               } else {
                    return 10;
                    // password yang dimasukan salah
               }
          } else {
               return 100;
               // user tidak ditemukan
          }
     }

     public function idUser()
     {
          return $this->id;
     }
}

class Select extends Db
{
     public function selectUserById($id)
     {
          $result = mysqli_query($this->conn, "SELECT * FROM user WHERE id = $id");
          return mysqli_fetch_assoc($result);
     }
}
