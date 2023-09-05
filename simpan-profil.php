<?php
require_once 'cek-akses.php';
$koneksi = mysqli_connect("localhost","root","","pkl");

if($koneksi){
    echo "";
}else{
    echo "Koneksi Gagal :".mysqli_connect_error();
}

$tinggal = $_POST['tinggal'];
$lahir = $_POST['lahir'];
$jk = $_POST['jk'];
$tanggal = $_POST['tanggal'];
$id_user = $_SESSION['user']['id'];

$query = "INSERT INTO profil (tinggal, lahir, jk, tanggal,id_user) VALUES ('$tinggal','$lahir','$jk','$tanggal','$id_user')";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_error($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    header("location: tambah-profil.php");
                  }

?>