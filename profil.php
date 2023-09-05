<?php
require_once 'cek-akses.php';
$pdo = new PDO('mysql:host=localhost; dbname=pkl',"root","");
$sql = "SELECT * FROM users WHERE id=:id";
$query = $pdo->prepare($sql);
$query->execute(array('id' => $_SESSION['user']['id']));
$user = $query->fetch();





$error ='';
if(!empty($_POST)){
    //validasi email harus unik
    $sqlEmail="SELECT count(*) FROM users WHERE email=:email and id!=:id";
    $queryEmail = $pdo->prepare($sqlEmail);
    $queryEmail->execute(array(
        'email' => $_POST['email'],
        'id' => $_SESSION['user']['id']
    ));
    $count = $queryEmail->fetchColumn();
    if($count > 0){
        $error = 'Email telah digunakan,silahkan pakai email lain';
    }else{
        
        $sqlUpdate="UPDATE users Set nama=:nama,email=:email WHERE id=:id";
        $queryUpdate = $pdo->prepare($sqlUpdate);
        $queryUpdate->execute(array(
        'nama' => $_POST['nama'],    
        'email' => $_POST['email'],
        
        'id' => $_SESSION['user']['id']));
        
        $_SESSION['user']['nama']=$_POST['nama'];
        $_SESSION['user']['email']=$_POST['email'];

    if (!empty($_POST['password_lama']) && !empty($_POST['password_baru'])) {
        if(($_POST['password_lama']) != $user['password']){
            $error= 'password lama salah';
        }else{
            if($_POST['password_baru'] !=$_POST['password_baru2']){
                $error='password baru dan ketik ulang password baru harus sama';
            }else{
                $sqlPassword="UPDATE users Set password=:password WHERE id=:id";
                $queryPassword = $pdo->prepare($sqlPassword);
                $queryPassword->execute(array(
                'password' => $_POST['password_baru'],    
                'id' => $_SESSION['user']['id']
    ));
    
    header("Location:profil.php");
            }
        }
    }else{
        header("Location:profil.php");
    }
}}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profil User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
        </style>
<nav>
  <div class="container">
      <h2 style="font-weight:1000;" class="log">
          Instragam
      </h2>
     
      <div class="create" >
          <a href="logout.php" class="btn btn-primary" for="create-post"style="margin-left:720px;">Keluar</a>
          <div class="profile-photo">
              <img src="#" alt="">
          </div>
      </div>
  </div>
</nav>
    
<?php 

    ?>
<main>
  <div class="container">
    <div class="left">
      <a style="text-decoration:none;color:black;"class="profile">
        <?php include 'pp.php';?>
      </a>
        <?php include 'indexadit.php';?>
        
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
            <div class="col-11">
                <?php
                if($error !=''){
                    echo '<p class="text-warning">'.$error.'</p>';
                }
                ?>
                <form action="" method="POST" style="padding-left:35px;padding-top:20px;font-size:16px;">
                    <h5>Ganti Nama Atau Email</h5>
                    <p class="text-info">Kosongkan jika tidak diganti</p>
                    <div class="mb-3" >
                        <label style="font-weight:bold" class="form-label">Nama</label>
                        <input type="text" name="nama"class="form-control" value="<?php echo isset ($_POST['nama']) ? $_POST['nama'] : $user['nama'];?>" required>
                    </div>
                    <div class="mb-3">
                        <label style="font-weight:bold" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo isset ($_POST['email']) ? $_POST['email'] : $user['email'];?>" required>
                    </div>
                    
                    

                    <hr/>
                    <h5>Ganti Password</h5>
                    <p class="text-info">Kosongkan jika tidak diganti</p>
                    <div class="mb-3">
                        <label style="font-weight:bold" class="form-label">Password lama</label>
                        <input type="password" name="password_lama" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label style="font-weight:bold" class="form-label">Password baru</label>
                        <input type="password" name="password_baru" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label style="font-weight:bold" class="form-label">Ketik ulang Password baru</label>
                        <input type="password" name="password_baru2" class="form-control">
                    </div>
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