<?php
$pdo = new PDO('mysql:host=localhost; dbname=pkl', "root", "");

?>



<?php
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
}
?>

<?php
if (isset($_GET['cari'])) {
    $sql = "SELECT topik.*, users.nama, users.gambar FROM topik
        INNER JOIN users ON topik.id_user=users.id where users.nama like '%" . $cari . "%'
        ORDER BY tanggal DESC ";
    $query1 = $pdo->prepare($sql);
    $query1->execute();
} else {
    $sql = "SELECT topik.*, users.nama, users.gambar FROM topik
        INNER JOIN users ON topik.id_user=users.id
        ORDER BY tanggal DESC";
    $query1 = $pdo->prepare($sql);
    $query1->execute();
}
?>
<br />
<?php while ($data1 = $query1->fetch()) { ?>
    <br />
    <div class="row ">
        <figure class="">
            <blockguote class="blockquote">
                <a style="text-decoration:none;color:black;" href="profil-utama.php?id=<?php echo $data1['id_user'];?>&user_id=<?php echo $data1['unique_id_user']; ?>">
                    <div
                        style="margin-top: 15px;float:left;max-height:45px;max-width:45px;border-radius:50%;overflow:hidden;margin-left:15px;margin-right:10px;">
                        <img src="image/<?php echo $data1['gambar']; ?>" width="40px;">
                    </div>
                    <div style="color:white;font-weight:bold; padding-top: 20px; font-family:arial; margin-bottom: 15px;">
                        <?php echo htmlentities($data1['nama']); ?><br>
                    </div>
                </a>
                <div style="color: #a7a7a7;padding-left:15px;">
                    <hr>
                </div>
                <div style="text-decoration:none; color:white;padding-left:30px;font-size:19px;font-family:arial;"
                    class="row">
                    <?php echo htmlentities($data1['deskripsi']); ?>
                </div>
                
                <?php
                if (!empty($data1['gambar1'])) { ?>
                    <img src="image/<?php echo $data1['gambar1']; ?>" style="width: 665px;padding-right:20px;padding-top:17px;">
                <?php } else {
                    echo '';
                } ?>
                <div style="color: #a7a7a7;padding-left:15px;">
                    <hr>
                    <a class="uil uil-comment"
                        style="float:left;text-decoration:none; color:white;padding-top:3px;15px;font-size:19px;font-family:arial;"
                        href="lihat-topik.php?id=<?php echo $data1['id'] ?>">
                        Komentar
                    </a>
                    <small style="font-size:12px;margin-left:390px;color:grey;">
                        <?php echo date('d M Y H:i', strtotime($data1['tanggal'])); ?>
                    </small>
                    <hr style="color:black;margin-top:50px;margin-bottom:-10px;">
                </div>
                </blockquote>
        </figure>
    </div>
<?php } ?>