<?php require_once 'cek-akses.php';

    // melakukan koneksi 
    $connect = mysqli_connect('localhost', 'root', '', 'pkl');
    $id=$_SESSION['user']['unique_id'];
    // mengambil data 5 pesan terbaru 
    $sql = "SELECT * FROM messages where incoming_msg_id = $id and status = true ORDER BY msg_id DESC limit 5";
    $pdo = new PDO('mysql:host=localhost; dbname=pkl', "root", "");
        $query = $pdo->prepare($sql);
        $query->execute();
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <title>Sosmed</title>
</head>
<style>
  .bg {
    width: 700px;
    height: 125px;
    border-radius: 15px;
    background-color: white;
    box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
  }

  .bg1 {
    padding-left: 0;
    padding-bottom: 15px;
    margin-left: 21px;
    margin-bottom: -10px;
    width: 700px;
    height: auto;
    border-radius: 15px;
    background-color: white;
    box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);

  }

  button {
    margin-top: 10px;
  }

  .a {
    color: rgb(124, 124, 124);

  }

  .a:hover {
    color: white;
  }

  /* Import Google font - Poppins */
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

<body>
  <nav>
    <div class="container">
      <h2 style="font-weight:1000;" class="log ">
        Schwarzer
      </h2>
      <div class="create">
        <form action="index.php" method="get">

          <input
            style="margin-left:-400px;border-radius:50px;padding-bottom:10px;padding-top:10px;padding-left:30px;padding-right:140px;margin-right:10px;background-color:rgb(234, 234, 234);"
            placeholder="Cari" type="text" name="cari">
          <button style="border-radius:50px;margin-top:-1px;padding-right:30px;margin-right:10px" type="submit"
            class="btn btn-primary uil uil-search"></button>
        </form>
        <?php include 'notif.php'; ?>
       
      </div>
    </div>
  </nav>
  <main>
    <div class="container">
      <div class="left">
        <a style="text-decoration:none;color:black;" class="profile">
          <?php include 'pp.php'; ?>
        </a>
        <?php include 'sidebar.php'; ?>

      </div>
      <div class="middle">
        <?php include 'upload.php'; ?>
        <?php include 'topik.php'; ?>
      </div>
    </div>
  </main>
  <?php include 'modal.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

</body>

</html>