<?php
require_once 'cek-akses.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.CSS" rel="stylesheet">


    <title>Forum PHP: Lihat Topik</title>
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

    /* Import Google font - Poppins */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    ::selection {
        color: #fff;
        background: #4671EA;
    }

    .wrapper {

        border-radius: 5px;
        margin-top: 15px;

    }

    .wrapper h2 {
        color: #4671EA;
        font-size: 28px;
        text-align: center;
    }

    .wrapper textarea {
        width: 100%;
        resize: none;
        height: 100px;
        outline: none;
        padding: 15px;
        font-size: 16px;
        border-radius: 10px;
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
                <a href="logout.php" class="btn btn-primary" style="margin-right:20px;">
                    Keluar
                </a>
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
                <?php
                if (isset($_GET['id']) && !empty($_GET['id'])) {
                    $pdo = new PDO('mysql:host=localhost; dbname=pkl', "root", "");
                    $sql = "SELECT topik.*, users.nama, users.email FROM topik
                    INNER JOIN users ON topik.id_user=users.id
                    WHERE topik.id=:id";
                    $query = $pdo->prepare($sql);
                    $query->execute(array('id' => $_GET['id']));
                    $topik = $query->fetch();
                } ?>
                <form method="POST" action="jawab-topik.php">

                    <div class="wrapper">
                        <textarea spellcheck="false" name="komentar" placeholder="Ketik Sesuatu di Sini..."
                            required></textarea>
                        <input type="hidden" value="<?php echo $topik['id']; ?>" name="id_topik" />
                    </div>
                    <div style="margin-top:-8px;" class="text-end">
                        <button type="submit" class="btn btn-primary">Balas Postingan</button>
                    </div>
                </form>
            </div>
            <?php
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $pdo = new PDO('mysql:host=localhost; dbname=pkl', "root", "");
                $sql = "SELECT topik.*, users.nama, users.gambar FROM topik
                INNER JOIN users ON topik.id_user=users.id
                WHERE topik.id=:id";
                $query = $pdo->prepare($sql);
                $query->execute(array('id' => $_GET['id']));
                $topik = $query->fetch();
                if (empty($topik)) {
                    echo '<p class="text-warning">Topik tidak ditemukan</p>';
                } else {
                    ?>
                    <figure class="bg1">
                        <div class="row"
                            style="font-weight:bold; padding-left:15px; padding-top: 17px; font-family:arial; font-size:25px;">
                            <img src="image/<?php echo $topik['gambar']; ?>"
                                style="width: 80px;border-radius:50%;margin-top:-1px;">
                            <?php echo htmlentities($topik['nama']); ?>
                            <p style="font-size:12px;margin-left:70px;margin-top:-22px;" class="text-muted">
                                <?php echo date('d M Y H:i', strtotime($topik['tanggal'])); ?>
                            </p>
                            <br>
                        </div>
                        <p
                            style="padding-left:16px;margin-top:-34px;margin-bottom:20px;font-weight:bold;font-size:20px;padding-right:16px;">
                            <?php echo htmlentities($topik['deskripsi']); ?>
                        </p>

                        <?php
                        if (!empty($topik['gambar1'])) { ?>
                            <img src="image/<?php echo $topik['gambar1']; ?>" style="width: 100%px;margin-top:15px;">
                        <?php } else {
                            echo '';
                        } ?>
                        <?php
                        $sql2 = "SELECT komentar.*, users.nama, users.email FROM komentar
                                                INNER JOIN users ON users.id = komentar.id_user
                                                WHERE id_topik=:id_topik";
                        $query2 = $pdo->prepare($sql2);
                        $query2->execute(
                            array(
                                'id_topik' => $_GET['id']
                            )
                        );
                        while ($komentar = $query2->fetch()) {
                            ?>

                            <div class="row mb-3">
                                <div class="col-auto">
                                    <div style="padding-left:18px;padding-right:15px" class="col">
                                        <div class="bg-light py-2 px-3 rounded">
                                            <div class="row">
                                                <div class="col fw-bold">
                                                    <?php echo htmlentities($komentar['nama']); ?>
                                                </div>
                                                <?php if (($_SESSION['user']['id']) == ($komentar['id_user'])) { ?>

                                                    <div class="col-auto">
                                                        <a href="hapus-komentar.php?id=<?php echo $komentar['id']; ?>"
                                                            onclick="return confirm('Apa anda yakin ingin menghapus komentar?')"
                                                            class="text-muted"><small>hapus</small></a>
                                                    </div>
                                                <?php } else {
                                                    echo '';
                                                } ?>
                                                <div class="col-auto">
                                                    <small class="text-muted">
                                                        <?php echo date('d M Y H:i', strtotime($komentar['tanggal'])); ?>
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <?php echo nl2br(htmlentities($komentar['komentar'])); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                }
            } ?>
        </div>
        </figure>
        </div>
    </main>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
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