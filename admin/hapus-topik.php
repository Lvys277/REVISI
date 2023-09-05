<?php
$pdo = new PDO('mysql:host=localhost; dbname=pkl',"root","");
try {
    $pdo->beginTransaction();
    $queryHapusKomentar = $pdo->prepare("DELETE FROM komentar WHERE id_topik=:id_topik");
    $queryHapusKomentar->execute(array(
        'id_topik' => $_GET['id']
    ));
    $sqlHapus = "DELETE FROM topik WHERE id=:id";
    $queryHapus = $pdo->prepare($sqlHapus);
    $queryHapus->execute(array(
        'id' => $_GET['id'],
));
$pdo->commit();
}catch(Exception $e) {
    $pdo->rollBack();
    echo $e->getMessage();
    exit;
}
header("Location: topik.php");
?>
?>