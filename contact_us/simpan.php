<?php 
include '../koneksi.php';

$nama = $_POST['nama']; 
$email = $_POST['email']; 
$komentar = $_POST['komentar']; 

$sql = "INSERT INTO contact_us (nama, email, komentar)VALUES('$nama','$email','$komentar')";

$result = mysqli_query($connection, $sql);
if(!$result){
    die ("Query gagal dijalankan: ".mysqli_error($connection).
         " - ".mysqli_error($connection));
} else {


echo '<h2>Data sudah disimpan</h2>';
}
?>