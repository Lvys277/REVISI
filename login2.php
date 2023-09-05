<?php
session_start();
$hasil = true;
if (!empty($_POST)) {
  $pdo=new PDO('mysql:host=localhost; dbname=pkl',"root","");
  $sql = "SELECT * FROM users where email = :email";
  $query = $pdo->prepare($sql);
  $query->execute(array('email' => $_POST['email']));
  $user = $query->fetch();
  if(!$user) {
    $hasil = false;
  }elseif($_POST['password'] != $user['password']){
    $hasil = false;
  }else{
    $_POST['password'] = $user['password'];
    $hasil = true;
    $_SESSION['user']= array(
      'id' => $user['id'],
      'nama' => $user['nama'],
    );

    header("location: index.php");
    exit;
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <?php include 'menu.php';?>

      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <?php
            if(!$hasil){
            echo '<p class="text-danger">Email atau password salah</p>';
            }
            ?>

            <form action="" method="post">
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-primary">Login</button>
            </form>
          </div>
        </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>