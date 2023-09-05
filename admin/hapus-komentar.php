<?php
$pdo = new PDO('mysql:host=localhost; dbname=pkl',"root","");
$sqlHapus = "DELETE FROM komentar WHERE id=:id ";
$queryHapus = $pdo->prepare($sqlHapus);
$queryHapus->execute(array(
    'id' => $_GET['id']
));

header("Location: komentar.php");
?>