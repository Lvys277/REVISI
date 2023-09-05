<?php
require_once 'cek-akses.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <title>Profil</title>
</head>

<body>
  <?php
  include 'navbar.php';
  ?>
  <style>
    .bg1 {

      padding-left: 0;

      margin-left: 9px;
      width: 700px;
      height: auto;
      border-radius: 15px;
      background-color: white;
      box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
    }

    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    ::selection {
      color: #fff;
      background: #4671EA;
    }

    .wrapper {
      width: 470px;
      background: #fff;
      border-radius: 5px;
      padding: 5px;

    }

    .wrapper h2 {
      color: #4671EA;
      font-size: 28px;
      text-align: center;
    }

    .wrapper textarea {
      width: 100%;
      resize: none;
      height: 159px;
      outline: none;
      padding: 15px;
      font-size: 16px;
      margin-top: 20px;
      border-radius: 5px;
      max-height: 330px;
      caret-color: #4671EA;
      border: 1px solid #bfbfbf;
    }

    textarea::placeholder {
      color: #b3b3b3;
    }

    textarea:is(:focus, :valid) {
      padding: 14px;
      border: 2px solid #4671EA;
    }

    textarea::-webkit-scrollbar {
      width: 0px;
    }
  </style>
  <main>
    <div class="container">
      <div class="left">
        <a style="text-decoration:none;color:black;" class="profile">
          <?php include 'pp.php'; ?>
        </a>
        <?php include 'sidebar.php'; ?>
        <label for="create-post" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">Buat
          Postingan</label>
      </div>
      <?php
      $pdo = new PDO('mysql:host=localhost; dbname=pkl', "root", "");
      $sql2 = "SELECT  gambar,nama FROM users WHERE id=:id";
      $query2 = $pdo->prepare($sql2);
      $query2->execute(
        array(
          'id' => $_GET['id']
        )
      );
      while ($komentar = $query2->fetch()) {
        ?>
        <div class="row mb-3">
          <div class="col-auto">
            <div class="col">
              <div style="padding-top:20px;margin-bottom:30px;padding-bottom:15px;" class="bg1">
                <center>
                  <?php if (($_SESSION['user']['id']) == ($_GET['id'])) { ?>
                    <button type="button" style="border-color:white;" class="btn " data-bs-toggle="modal"
                      data-bs-target="#staticBackdrop0">
                      <div style="max-height:200px;max-width:200px;border-radius:50%;overflow:hidden;">
                        <img src="image/<?php echo $topik['gambar']; ?>" width="200px;">
                      </div></a>
                    </button>
                  <?php } else { ?>
                    <div style="max-height:200px;max-width:200px;border-radius:50%;overflow:hidden;">
                      <img src="image/<?php echo $komentar['gambar']; ?>" width="200px;">
                    </div>
                    <a href="pesan/chat.php?user_id=<?php echo $_GET['user_id']; ?>">
                      <span><i class="uil uil-message"></i></span>
                    </a>
                  <?php } ?>
                  <div class="row">
                    <div style="padding-top:15px;font-size:26px;" class="col fw-bold">
                      <?php echo htmlentities($komentar['nama']); ?>
                    </div>
                  </div>
                <?php } ?>
                <?php
                $pdo = new PDO('mysql:host=localhost; dbname=pkl', "root", "");
                $sql2 = "SELECT * FROM profil WHERE id_user=:id";
                $query2 = $pdo->prepare($sql2);
                $query2->execute(
                  array(
                    'id' => $_GET['id']
                  )
                );

                while ($komentar = $query2->fetch()) {
                  ?>




                  <p class="uil uil-home" style="padding-top:10px;font-size:14px;"> Tinggal di <a
                      style="font-weight:bold;">
                      <?php echo $komentar['tinggal']; ?>
                    </a></p>
                  <p class="uil uil-map-marker" style="font-size:14px;"> Lahir di <a style="font-weight:bold;">
                      <?php echo $komentar['lahir']; ?>
                    </a></p>
                  <p class="uil uil-user" style="font-size:14px;"> Jenis Kelamin <a style="font-weight:bold;">
                      <?php echo $komentar['jk']; ?>
                    </a></p>
                  <p class="uil uil-gift" style="font-size:14px;"> Tanggal Lahir <a style="font-weight:bold;">
                      <?php echo $komentar['tanggal']; ?>
                    </a></p>
                <?php } ?>
              </center>
              
            </div>
          </div>
          <?php if (($_SESSION['user']['id']) == ($_GET['id'])) { ?>
            <div style="padding-top:20px;" class="bg1">
              <?php
              $pdo = new PDO('mysql:host=localhost; dbname=pkl', "root", "");
              $sql = "SELECT  gambar,nama FROM users WHERE id=:id";
              $query = $pdo->prepare($sql);
              $query->execute(array('id' => $_SESSION['user']['id']));
              $topik = $query->fetch();
              ?>
              <button style="background-color:rgb(255, 255, 255);">
                <div style="max-height:65px;max-width:65px;border-radius:50%;overflow:hidden;margin-left:20px;">
                  <img src="image/<?php echo $topik['gambar']; ?>" width="65px;">
                </div>
              </button>
              <button type="button"
                style="margin-left:35px;;margin-bottom:50px;padding-right:255px;background-color:rgb(234, 234, 234);"
                class="btn " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Apa yang kamu pikirkan?
              </button>
              <button style="margin-bottom:50px;" type="button" class="btn " data-bs-toggle="modal"
                data-bs-target="#staticBackdrop1">
                <i style="font-size:30px;" class='uil uil-image-plus'></i>
              </button>
            </div>
          <?php } else {
            echo '';
          } ?>
        </div>
      </div>

      <div class="row">
        <?php
        $pdo = new PDO('mysql:host=localhost; dbname=pkl', "root", "");
        $sql2 = "SELECT topik.*, users.nama, users.gambar, id_user FROM topik
            INNER JOIN users ON topik.id_user=users.id WHERE users.id=:id ORDER BY tanggal DESC";
        $query2 = $pdo->prepare($sql2);
        $query2->execute(
          array(
            'id' => $_GET['id']
          )
        );
        while ($komentar = $query2->fetch()) { ?>
          <figure>
            <div style="margin-left:303px;padding-left:15px;" class="bg1">
              <blockguote class="blockquote">
                <div
                  style="margin-top: 15px;float:left;max-height:45px;max-width:45px;border-radius:50%;overflow:hidden;margin-right:10px;">
                  <img src="image/<?php echo $komentar['gambar']; ?>" width="40px;">
                </div>
                <div style="font-weight:bold; padding-top: 20px; font-family:arial; margin-bottom: 15px;">
                  <?php echo htmlentities($komentar['nama']); ?><br>
                </div>
                <div style=";color: #a7a7a7;padding-right:15px;">
                  <hr>
                </div>
                <a style="text-decoration:none; color:black;font-size:19px;font-family:arial;" <?php echo $komentar['id'] ?>><?php echo htmlentities($komentar['deskripsi']); ?></a><br>
                <?php
                if (!empty($komentar['gambar1'])) { ?>
                  <img src="image/<?php echo $komentar['gambar1']; ?>"
                    style="width: 700px;margin-left:-15px;padding-top:17px;">
                <?php } else {
                  echo '';
                } ?>
                <div style="color: #a7a7a7;padding-right:15px;">
                  <hr>
                  <?php if ($_SESSION['user']['id'] == $_GET['id']) {?>
                  <?php if ($_SESSION['user']['id'] == $komentar['id_user']) ?>
                  <a href="hapus-topik.php?id=<?php echo $komentar['id']; ?>"
                    onclick="return confirm('Apa anda yakin ingin menghapus topik?')" class="text-danger"
                    style="text-decoration: none;font-size: 15px;">hapus</a> <?php } else {
                      echo '';
                    }?>
                  <small class="text-muted" style="margin-left:500px;font-size:11px;margin-bottom:50px;">
                    <?php echo date('d M Y H:i', strtotime($komentar['tanggal'])); ?>
                  </small>
                </div>
                </blockquote>
            </div>
          </figure>
        <?php } ?>
      </div>
  </main>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
  <?php include 'modal.php'; ?>
  <script>
    const textarea = document.querySelector("textarea");
    textarea.addEventListener("keyup", e => {
      textarea.style.height = "63px";
      let scHeight = e.target.scrollHeight;
      textarea.style.height = `${scHeight}px`;
    });
  </script>

</body>

</html>