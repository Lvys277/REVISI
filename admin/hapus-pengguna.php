<?php
$pdo = new PDO('mysql:host=localhost; dbname=pkl',"root","");
$pdo1 = new PDO('mysql:host=localhost; dbname=pkl',"root","");
$pdo2 = new PDO('mysql:host=localhost; dbname=pkl',"root","");
$pdo3 = new PDO('mysql:host=localhost; dbname=pkl',"root","");
try {
    $pdo3->beginTransaction();
    $queryHapusPesan = $pdo->prepare("DELETE FROM messages WHERE id_user=:id");
    $queryHapusPesan->execute(array(
        'id' => $_GET['id']
    ));
    $pdo2->beginTransaction();
    $queryHapusKomentar = $pdo->prepare("DELETE FROM komentar WHERE id_user=:id");
    $queryHapusKomentar->execute(array(
        'id' => $_GET['id']
    ));
    $pdo1->beginTransaction();
    $queryHapusProfil = $pdo->prepare("DELETE FROM profil WHERE id_user=:id");
    $queryHapusProfil->execute(array(
        'id' => $_GET['id']
    ));

    $pdo->beginTransaction();
    $queryHapusTopik = $pdo->prepare("DELETE FROM topik WHERE id_user=:id");
    $queryHapusTopik->execute(array(
        'id' => $_GET['id']
    ));
    $sqlHapus = "DELETE FROM users WHERE id=:id";
    $queryHapus = $pdo->prepare($sqlHapus);
    $queryHapus->execute(array(
        'id' => $_GET['id'],
));

$pdo->commit();
}catch(Exception $e) {
    $pdo->rollBack();
    $pdo1->rollBack();
    $pdo2->rollBack();
    $pdo3->rollBack();
    echo $e->getMessage();
    exit;
}
header("Location: pengguna.php");
?>