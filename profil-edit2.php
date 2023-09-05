<?php require_once 'cek-akses.php';
$pdo = new PDO('mysql:host=localhost; dbname=pkl', "root", "");
$sql = "SELECT * FROM users WHERE id=:id";
$query = $pdo->prepare($sql);
$query->execute(array('id' => $_SESSION['user']['id']));
$user = $query->fetch(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profil User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
    </style>
    <?php
    include 'navbar.php';
    ?>

    <?php

    ?>
    <main>
        <div class="container">
            <div class="left">
                <a style="text-decoration:none;color:black;" class="profile">
                    <?php include 'pp.php'; ?>
                </a>
                <?php include 'sidebar.php'; ?>

                <a href="tambah-profil.php"><label class="btn btn-primary">tentang anda</a></label>


            </div>
            <div class="middle">
                <div class="bg1" style="
                
                padding-left:0;  
              padding-bottom:15px;
              margin-left:9px;
              margin-bottom:-10px;
              width: 700px;
              height: auto;
              border-radius: 15px;
              background-color: white;
              box-shadow: 0 1px 5px rgba(0,0,0,0.1);
          
                  ">
                    <div class="col-12">

                        <form action="simpan-edit-profil.php" method="POST"
                            style="padding-right:35px;padding-left:35px;padding-top:20px;font-size:16px;">
                            <h5>Ganti Nama Atau Email</h5>
                            <p class="text-primary">Kosongkan jika tidak diganti</p>
                            <div class="mb-3">
                                <label style="font-weight:bold" class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control text-muted"
                                    value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : $user['nama']; ?>"
                                    required>
                            </div>
                            <?php
                            if ($_GET['req'] == 1) {
                                echo '<p style="margin-bottom:20px;color:red;"class="text-danger">Nama tidak boleh lebih dari 9 karakter.</p>';
                            } else {
                                echo "";
                            }
                            ?>
                            <div class="mb-3">
                                <label style="font-weight:bold" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control text-muted"
                                    value="<?php echo isset($_POST['email']) ? $_POST['email'] : $user['email']; ?>"
                                    required>
                            </div>

                            <?php
                            if ($_GET['req'] == 2) {
                                echo '<p style="margin-bottom:20px;color:red;"class="text-danger">Gunakan email yang berbeda</p>';
                            } else {
                                echo "";
                            } ?>


                            <h5>Ganti Password</h5>
                            <p class="text-primary">Kosongkan jika tidak diganti</p>
                            <?php
                            if ($_GET['req'] == 6) {
                                echo '<p style="margin-bottom:20px;color:green;"class="text-succes">password berhasil diganti</p>';
                            } else {
                                echo "";
                            } ?>
                            <div class="mb-3">
                                <label style="font-weight:bold" class="form-label">Password lama</label>
                                <input type="password" name="password_lama" class="form-control">
                            </div>
                            <?php
                            if ($_GET['req'] == 3) {
                                echo '<p style="margin-bottom:20px;color:red;"class="text-danger">password lama salah</p>';
                            } else {
                                echo "";
                            } ?>
                            <div class="mb-3">
                                <label style="font-weight:bold" class="form-label">Password baru</label>
                                <input type="password" name="password_baru" class="form-control">
                            </div>
                            <?php
                            if ($_GET['req'] == 4) {
                                echo '<p style="margin-bottom:20px;color:red;"class="text-danger">Pasword setidaknya harus 8 karakter dan harus memiliki huruf besar, huruf kecil, angka, dan spesial karakter.</p>';
                            } else {
                                echo "";
                            } ?>

                            <div class="mb-3">
                                <label style="font-weight:bold" class="form-label">Ketik ulang Password baru</label>
                                <input type="password" name="password_baru2" class="form-control">
                            </div>
                            <?php
                            if ($_GET['req'] == 5) {
                                echo '<p style="margin-bottom:20px;color:red;"class="text-danger">password baru dan ketik ulang password baru harus sama</p>';
                            } else {
                                echo "";
                            } ?>
                            <div class="text-end">
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </main>
</body>

</html>