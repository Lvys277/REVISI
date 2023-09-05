<?php
require_once 'cek-akses.php';
if (!empty($_POST)) {
    $pdo = new PDO('mysql:host=localhost; dbname=pkl',"root","");
    $sql = "insert into topik (judul, deskripsi, tanggal, id_user) values (:judul, :deskripsi, now(), :id_user)";
    $query = $pdo->prepare($sql);
    $query->execute(array(
        'judul' => $_POST['judul'],
        'deskripsi' => $_POST['deskripsi'],
        'id_user' => $_SESSION['user']['id'],
    ));
    header("Location: tambah-topik.php?sukses=1");
    exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Topik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <?php 
    $_menuAktif = 'tambah_topik';
    include 'menu.php';
    ?>
    <div class="container">
        <?php
        if (isset($_GET['sukses']) && $_GET['sukses'] == '1'){
            echo '<p class="text-success">Topik berhasil dikirim</p>';
        }
        ?>
      <div class="row">
        <div class="col-md-6">
            <form method="POST" action="">
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control" required/>
        </div>
        <div class="col-md-6">
            <form method="POST" action="">
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="10"> </textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
    </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>