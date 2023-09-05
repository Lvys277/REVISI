



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login & Registration Form</title>
  <!---Custom CSS File--->
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="registration form">
      <header>Signup</header>
<center>
  
    </center>

    <form action="simpan1.php" method="POST" enctype="multipart/form-data">
<input class="form-control" type="text" name="nama" required placeholder="Enter your name">
<input class="form-control" type="email" name="email"  required placeholder="Enter your email">
<input class="form-control" type="password" name="password" required placeholder="Enter your password">
<input class="form-control" type="password" name="password2" required placeholder="Konfirm your password">
<input style="padding-top:15px;" class="form-control" type="file" name="gambar"  required placeholder="Input your image">
<button class="btn btn-primary">Daftar</button>
    </form>
      <div class="signup">
        <div class="signup">Sudah daftar?
         <a href="login.php"><label for="check">Login</label></a>
</div>
        
      </div>
    </div>
    </div>

  

</body>
</html>