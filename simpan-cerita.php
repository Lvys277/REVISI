<?php require_once 'cek-akses.php';
if (!empty($_POST)) {
    $pdo = new PDO('mysql:host=localhost; dbname=pkl', "root", "");
    $sql = "insert into topik (deskripsi, tanggal, id_user,nama,unique_id_user) values (:deskripsi, now(), :id_user,:nama,:unique_id_user)";
    $query = $pdo->prepare($sql);
    $query->execute(
        array(
            'deskripsi' => $_POST['deskripsi'],
            'id_user' => $_SESSION['user']['id'],
            'nama' => $_SESSION['user']['nama'],
            'unique_id_user' => $_SESSION['user']['unique_id'],
        )
    );

    header("Location:index.php");
    exit;
}
?>