<!-- <?php
$pdo = new PDO('mysql:host=localhost; dbname=pkl',"root","");
$sql = "SELECT  gambar,nama FROM users WHERE id=:id";
$query = $pdo->prepare($sql);
$query->execute(array('id' => $_SESSION['user']['id']));
$topik = $query->fetch();
?>
<div style="max-height:50px;max-width:50px;border-radius:50%;overflow:hidden;">
    <img  src="image/<?php echo $topik['gambar'];?>"width="65px;">
</div>
    <div style="font-size:30px;font-family:arial;font-weight:bold;" class="handle">
        <?php echo htmlentities($topik['nama']);?><br>
    </div> -->
