<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <title>Registration Form</title>
</head>

<body>
  <section class="vh-150" style="background-color: #222230; color: white; ">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
            <div class="card-body p-md-2">
              <div class="row justify-content-center">
              <p style="padding-left:200px;" class="h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">Daftar</p>
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  

                  <form class="mx-1 mx-md-4" action="simpan-daftar.php" method="post" enctype="multipart/form-data">
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c"><i class="bi bi-person-circle"></i> Nama</label>
                        <input type="text" id="form3Example1c" class="form-control form-control-lg py-3" name="nama" autocomplete="off" placeholder="Masukkan Nama" style="border-radius:25px ; background-color: #42435c;color:white;" />
                        <?php
                        if ($_GET['req'] == 5) {
                        echo '<p style="margin-bottom:20px;color:yellow;"class="text">Nama tidak tersedia.</p>';
                        } else {
                        echo "";
                        }
                        if ($_GET['req'] == 1) {
                        echo '<p style="margin-bottom:20px;color:yellow;"class="text">Nama tidak boleh lebih dari 9 karakter.</p>';
                        } else {
                        echo "";
                        }
                        ?>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example3c"><i class="bi bi-envelope-at-fill"></i> Email</label>
                        <input type="email" id="form3Example3c" class="form-control form-control-lg py-3" name="email" autocomplete="off" placeholder="Masukkan Email" style="border-radius:25px ; background-color: #42435c;color:white;" />
                        <?php
                        if ($_GET['req'] == 2) {
                        echo '<p style="margin-bottom:20px;color:yellow;"class="text">Gunakan email yang berbeda</p>';
                        } else {
                        echo "";
                        } ?>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4c"><i class="bi bi-chat-left-dots-fill"></i> Password</label>
                        <input type="password" id="form3Example4c" class="form-control form-control-lg py-3" name="password" autocomplete="off" placeholder="Masukkan Pasword" style="border-radius:25px ; background-color: #42435c;color:white;" />
                        <?php
                        if ($_GET['req'] == 3) {
                        echo '<p style="margin-bottom:20px;color:yellow;"class="text">Pasword setidaknya harus 8 karakter dan harus memiliki huruf besar, huruf kecil, angka, dan spesial karakter.</p>';
                        } else {
                        echo "";
                        } ?>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4c"><i class="bi bi-chat-left-dots-fill"></i> Konfirmasi Password</label>
                        <input type="password" id="form3Example4c" class="form-control form-control-lg py-3" name="password2" autocomplete="off" placeholder="Konfirmasi Password" style="border-radius:25px ; background-color: #42435c;color:white;" />
                        <?php
                        if ($_GET['req'] == 4) {
                        echo '<p style="margin-bottom:20px;color:yellow;"class="text">Password dan ketik ulang password harus sama.</p>';
                        } else {
                        echo "";
                        } ?>
                      </div>
                    </div>
                    
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4c"><i class="bi bi-chat-left-dots-fill"></i> Foto Profil</label>
                        <input class="form-control" type="file" name="gambar" required
                        placeholder="Masukkan Foto Profil Anda">
                        </div>
                    </div>
                    
                    <div style="padding-left:15px;"class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <input type="submit" value="Daftar" name="register" class="btn btn-lg text-black my-2 py-3" style=" background-color: #eeecff; width:100% ; border-radius: 30px; font-weight:600;" style="border-radius:25px ; " />

                    </div>

                  </form>
                  <p align="center">Sudah mempunyai akun? <a href="login.php" class="" style="font-weight:600; text-decoration:none; color: yellow; ">Login</a></p>
                </div>
                <div class="col-md-5 col-lg-5 col-xl-6 d- align-items-center order-1 order-lg-2">

                  <img style="margin-top:50px;" src="signup1.png" class="img-fluid" alt="Sample image" height="300px" width="600px">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>