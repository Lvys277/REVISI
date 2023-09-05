<?php
$pdo = new PDO('mysql:host=localhost; dbname=pkl', "root", "");
$sqlEmail = "SELECT count(*) FROM users WHERE nama=:nama";
$queryEmail = $pdo->prepare($sqlEmail);
$queryEmail->execute(
  array(
    'nama' => $_POST['nama'],
  )
);
$count = $queryEmail->fetchColumn();
if ($count > 0) {
  header("location: daftar.php?req=5");
} else {
if (strlen($_POST['nama']) > 9) {

  header("location: daftar.php?req=1");
} else {
  $pdo = new PDO('mysql:host=localhost; dbname=pkl', "root", "");
  $sqlEmail = "SELECT count(*) FROM users WHERE email=:email";
  $queryEmail = $pdo->prepare($sqlEmail);
  $queryEmail->execute(
    array(
      'email' => $_POST['email'],
    )
  );
  $count = $queryEmail->fetchColumn();
  if ($count > 0) {
    header("location: daftar.php?req=2");
  } else {
    $password = $_POST['password'];
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
      header("location: daftar.php?req=3");
    } else {

      $koneksi = mysqli_connect("localhost", "root", "", "pkl");
      if ($koneksi) {
        echo "";
      } else {
        echo "Koneksi Gagal :" . mysqli_connect_error();
      }
      $gambar = $_FILES['gambar']['name'];
      $nama = $_POST['nama'];
      $email = $_POST['email'];
      $password2 = $_POST['password2'];
      if ($_POST['password'] != $_POST['password2']) {
        header("location: daftar.php?req=4");
      } else {
        if ($gambar != "") {
          $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
          $x = explode('.', $gambar);
          $ekstensi = strtolower(end($x));
          $file_tmp = $_FILES['gambar']['tmp_name'];
          $ran_id = rand(time(), 100000000);
          $angka_acak = rand(1, 999);
          $nama_gambar_baru = $angka_acak . '-' . $gambar;
          if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, 'image/' . $nama_gambar_baru);
            $query = "INSERT INTO users (nama, email, password,gambar,unique_id ) VALUES ('$nama','$email','$password','$nama_gambar_baru','$ran_id')";
            $result = mysqli_query($koneksi, $query);
            if (!$result) {
              die("Query gagal dijalankan: " . mysqli_error($koneksi) . " - " . mysqli_error($koneksi));
            } else {
              echo "<script>alert('Silahkan login');window.location='login.php';</script>";
            }
          } else {
            echo "<script>alert('Ekstensi gambar yang boleh hanya jpg,jpeg atau png.');window.location='daftar.php';</script>";
          }
        } else {
          $query = "INSERT INTO users (nama, email, password,gambar ) VALUES ('$nama','$email','$password','$nama_gambar_baru')";
          $result = mysqli_query($koneksi, $query);
          if (!$result) {
            die("Query gagal dijalankan: " . mysqli_error($koneksi) . " - " . mysqli_error($koneksi));
          } else {
            echo "<script>alert('Silahkan login');window.location='login.php';</script>";
          }
        }
      }
    }
  }
}}
?>