<?php
require_once 'cek-akses.php';
$pdo = new PDO('mysql:host=localhost; dbname=pkl', "root", "");
$sql = "SELECT * FROM profil WHERE id_user=:id";
$query = $pdo->prepare($sql);
$query->execute(array('id' => $_SESSION['user']['id']));
$user1 = $query->fetch();

if (empty($_POST)) {
    echo '';
} else {
    $sqlUpdate = "UPDATE profil Set tinggal=:tinggal,lahir=:lahir,jk=:jk,tanggal=:tanggal WHERE id_user=:id";
    $queryUpdate = $pdo->prepare($sqlUpdate);
    $queryUpdate->execute(
        array(
            'tinggal' => $_POST['tinggal'],
            'lahir' => $_POST['lahir'],
            'jk' => $_POST['jk'],
            'tanggal' => $_POST['tanggal'],
            'id' => $_SESSION['user']['id']
        )
    );
}

?>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Responsive Sidebar </title>

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
    body {
        margin-left: -1px;
    }

    .bg1 {
        padding-left: 0;
        padding-bottom: 15px;
        margin-left: 9px;
        margin-bottom: -10px;
        width: 700px;
        height: auto;
        border-radius: 15px;
        background-color: white;
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
    }
</style>

<body>
<nav>
    <div class="container">
        <h2 style="font-weight:1000;" class="log ">
            Schwarzer
        </h2>
            <div class="create" >
                <a href="logout.php" class="btn btn-primary" style="margin-right:20px;">
                Keluar
                </a>
                   
            </div>
    </div>
</nav>

    <?php

    ?>
    <main>
        <div class="container">
            <div class="left">
                <a style="text-decoration:none;color:black;" class="profile">
                    <?php include 'pp.php'; ?>
                </a>
                <?php include 'sidebar.php'; ?>



            </div>
            <div class="middle">
                <div class="bg1">
                    <?php if (empty($user1['id'])) { ?>
                        <div style="margin-left:10px;margin-top:10px;">
                            <form action="simpan-profil.php" method="POST">
                                <div class="mb-3">
                                    <label class="form-label">Tinggal di</label>
                                    <input type="text" name="tinggal" class="form-control"
                                        placeholder="Tempat tinggal anda sekarang" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Lahir di</label>
                                    <input type="text" name="lahir" class="form-control"
                                        placeholder="Tempat tinggal anda sekarang" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <select name="jk" class="form-select" aria-label="Default select example">
                                        <option selected></option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tanggal lahir</label>
                                    <input type="date" name="tanggal" class="form-control" required>
                                </div>
                                <button class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    <?php } else {
                        echo '';
                    } ?>
                    <?php if (!empty($user1['id'])) { ?>
                        <div class="col-12">

                            <form style="padding-right:25px;padding-left:25px;padding-top:20px" action="" method="POST">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Tinggal</label>
                                    <input type="text" name="tinggal" class="form-control text-muted"
                                        value="<?php echo isset($_POST['tinggal']) ? $_POST['tinggal'] : $user1['tinggal']; ?>"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Lahir</label>
                                    <input type="text" name="lahir" class="form-control text-muted"
                                        value="<?php echo isset($_POST['lahir']) ? $_POST['lahir'] : $user1['lahir']; ?>"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Jenis Kelamin</label>
                                    <select name="jk" class="form-select text-muted" aria-label="Default select example">
                                        <option selected>
                                            <?php echo isset($_POST['jk']) ? $_POST['jk'] : $user1['jk']; ?>
                                        </option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Tanggal Lahir</label>
                                    <input type="date" name="tanggal" class="form-control text-muted"
                                        value="<?php echo isset($_POST['tanggal']) ? $_POST['tanggal'] : $user1['tanggal']; ?>"
                                        required>
                                </div>
                                <div class="text-end">
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    <?php } else {
                        echo '';
                    } ?>


</body>

</html>