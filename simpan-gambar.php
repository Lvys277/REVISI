<?php
require_once 'cek-akses.php';
// memanggil file koneksi.php untuk melakukan koneksi database
$koneksi = mysqli_connect("localhost", "root", "", "PKL");

if ($koneksi) {
  echo "";
} else {
  echo "Koneksi Gagal :" . mysqli_connect_error();
}

// membuat variabel untuk menampung data dari form

$gambar = $_FILES['gambar']['name'];
$id = $_POST['judul'];
$id_user = $_SESSION['user']['id'];
$nama = $_SESSION['user']['nama'];
$unique_id_user = $_SESSION['user']['unique_id'];

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
    $query = "INSERT INTO topik ( deskripsi,tanggal, id_user,gambar1,nama,unique_id_user ) VALUES ('$id',now(),'$id_user','$nama_gambar_baru','$nama','$unique_id_user')";
    $result = mysqli_query($koneksi, $query);
    // periska query apakah ada error
    if (!$result) {
      die("Query gagal dijalankan: " . mysqli_error($koneksi) .
        " - " . mysqli_error($koneksi));
    } else {
      //tampil alert dan akan redirect ke halaman index.php
      //silahkan ganti index.php sesuai halaman yang akan dituju
      header("location: index.php");
    }

  } else {
    //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
    echo "<script>alert('Ekstensi gambar yang boleh hanya jpg,jpeg atau png.');window.location='index.php';</script>";
  }
} else {
  $query = "INSERT INTO topik (deskripsi,gambar,nama,unique_id_user) VALUES ( '$id','$nama_gambar_baru','$nama','$unique_id_user')";
  $result = mysqli_query($koneksi, $query);
  // periska query apakah ada error
  if (!$result) {
    die("Query gagal dijalankan: " . mysqli_error($koneksi) .
      " - " . mysqli_error($koneksi));
  } else {
    //tampil alert dan akan redirect ke halaman index.php
    //silahkan ganti index.php sesuai halaman yang akan dituju
    header("location: index.php");
  }
}