<?php
require_once 'cek-akses.php';
// memanggil file koneksi.php untuk membuat koneksi
$koneksi = mysqli_connect("localhost", "root", "", "pkl");

// membuat variabel untuk menampung data dari form

$gambar = $_FILES['gambar']['name'];
$id = $_SESSION['user']['id'];
$nama = $_SESSION['user']['nama'];

//cek dulu jika ada gambar produk jalankan coding ini
if ($gambar != "") {
  $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gambar']['tmp_name'];
  $angka_acak = rand(1, 999);
  $nama_gambar_baru = $angka_acak . '-' . $gambar; //menggabungkan angka acak dengan nama file sebenarnya
  if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    move_uploaded_file($file_tmp, 'image/' . $nama_gambar_baru); //memindah file gambar ke folder gambar
    // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
    $query = "UPDATE users SET gambar='$nama_gambar_baru' WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    $query1 = "UPDATE messages SET gambar='$nama_gambar_baru' WHERE nama='$nama'";
    $result = mysqli_query($koneksi, $query1);
    // periska query apakah ada error
    if (!$result) {
      die("Query gagal dijalankan: " . mysqli_error($koneksi) .
        " - " . mysqli_error($koneksi));
    } else {
      //tampil alert dan akan redirect ke halaman index.php
      //silahkan ganti index.php sesuai halaman yang akan dituju
      header("Location: profil-utama.php?id=".$_SESSION['user']['id']);
    }

  } else {
    //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
    header("Location: profil-utama.php?id=".$_SESSION['user']['id']);
  }
} else {
  $sqlUpdate = "UPDATE users SET gambar='$nama_gambar_baru' WHERE id=:id";
  $queryUpdate = $pdo->prepare($sqlUpdate);
  $queryUpdate->execute(
      array(
          'id' => $_SESSION['user']['id']
      )
  );
  $sqlUpdate = "UPDATE messages SET gambar='$nama_gambar_baru' WHERE id=:id";
  $queryUpdate = $pdo->prepare($sqlUpdate);
  $queryUpdate->execute(
      array(
          'id' => $_SESSION['user']['id']
      )
  );
  $_SESSION['user']['gambar'] = $nama_gambar_baru;
    //tampil alert dan akan redirect ke halaman index.php
    //silahkan ganti index.php sesuai halaman yang akan dituju
    header("Location: profil-utama.php?id=".$_SESSION['user']['id']);
  }
