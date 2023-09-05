<?php
session_start();
$hasil = true;
if (!empty($_POST)) {
  $pdo = new PDO('mysql:host=localhost; dbname=pkl', "root", "");
  $sql = "SELECT * FROM admin where email = :email";
  $query = $pdo->prepare($sql);
  $query->execute(array('email' => $_POST['email']));
  $user = $query->fetch();
  if (!$user) {
  } elseif ($_POST['password'] != $user['password']) {
  } else {
    $_POST['password'] = $user['password'];
    $_SESSION['admin'] = array(
      'id' => $user['id'],
      'nama' => $user['nama'],
    );
    header("location: admin/indexadmin.php");
    
  }

if (!empty($_POST)) {
  $pdo = new PDO('mysql:host=localhost; dbname=pkl', "root", "");
  $sql = "SELECT * FROM users where email = :email";
  $query = $pdo->prepare($sql);
  $query->execute(array('email' => $_POST['email']));
  $user = $query->fetch();
  if (!$user) {
    $hasil = false;
  } elseif ($_POST['password'] != $user['password']) {
    $hasil = false;
  } else {
    $_POST['password'] = $user['password'];
    $hasil = true;
    $_SESSION['user'] = array(
      'id' => $user['id'],
      'nama' => $user['nama'],
      'unique_id' => $user['unique_id'],
      'gambar' => $user['gambar'],
    );
    header("location: index.php");
    exit;
  }
}}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

</head>
<style>
    .divider:after,
    .divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;

}
  </style>
<body>
<section class="vh-100" style="background-color: #222230; color: white;>
    <div class="container h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-5 col-lg-5 col-xl-4">
          <img style="margin-top:30px;" src="login1.png" class="img-fluid" alt="Phone image" height="300px" width="600px">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <form action="" method="post">
            <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">Masuk </p>
            <?php
            if (!$hasil) {
            echo '<p style="margin-bottom:20px;color:yellow;"class="text-danger">Email atau password salah</p>';
            }
            ?>
            <!-- Email input -->
            <div class="form-outline mb-4" >
              <label class="form-label" for="form1Example13"> <i class="bi bi-person-circle"></i> Email</label>
              <input type="email" id="form1Example13" class="form-control form-control-lg py-3" name="email" autocomplete="off" placeholder="Masukkan Email" style="border-radius:25px ; background-color: #42435c;color:white;" />

            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form1Example23"><i class="bi bi-chat-left-dots-fill"></i> Password</label>
              <input type="password" id="form1Example23" class="form-control form-control-lg py-3" name="password" autocomplete="off" placeholder="Masukkan Password" style="border-radius:25px ; background-color: #42435c;color:white;" />

            </div>


            <!-- Submit button -->
            <!-- <button type="submit" class="btn btn-primary btn-lg">Login in</button> -->
            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
              <input type="submit" value="Masuk" name="login" class="btn btn-lg text-black my-2 py-3" style="width:100% ; border-radius: 30px; font-weight:600; background-color: #eeecff;" />
            </div>

          </form><br>
          <p align="center">Tidak punya akun? <a href="daftar.php?req=0" class="" style="font-weight:600;text-decoration:none; color: yellow;">Daftar</a></p>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>