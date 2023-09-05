<?php
require_once 'cek-akses.php';
if (strlen($_POST['nama']) > 9) {

    header("location:profil-edit.php?req=1");
} else {
    if (!empty($_POST)) {
        $pdo = new PDO('mysql:host=localhost; dbname=pkl', "root", "");
        $sql = "SELECT * FROM users WHERE id=:id";
        $query = $pdo->prepare($sql);
        $query->execute(array('id' => $_SESSION['user']['id']));
        $user = $query->fetch();

        //validasi email harus unik
        $sqlEmail = "SELECT count(*) FROM users WHERE email=:email and id!=:id";
        $queryEmail = $pdo->prepare($sqlEmail);
        $queryEmail->execute(
            array(
                'email' => $_POST['email'],
                'id' => $_SESSION['user']['id']
            )
        );
        $count = $queryEmail->fetchColumn();
        if ($count > 0) {
            header("location:profil-edit.php?req=2");
        } else {
            $sqlUpdate = "UPDATE users Set nama=:nama,email=:email WHERE id=:id";
            $queryUpdate = $pdo->prepare($sqlUpdate);
            $queryUpdate->execute(
                array(
                    'nama' => $_POST['nama'],
                    'email' => $_POST['email'],

                    'id' => $_SESSION['user']['id']
                )
            );
            $_SESSION['user']['nama'] = $_POST['nama'];
            $_SESSION['user']['email'] = $_POST['email'];

            if (!empty($_POST['password_lama']) && !empty($_POST['password_baru'])) {

                if (($_POST['password_lama']) != $user['password']) {
                    header("location:profil-edit.php?req=3");

                } else {
                    if ($_POST['password_baru'] != $_POST['password_baru2']) {
                        header("location:profil-edit.php?req=5");

                    } else {
                        $password = $_POST['password_baru'];
                        $uppercase = preg_match('@[A-Z]@', $password);
                        $lowercase = preg_match('@[a-z]@', $password);
                        $number = preg_match('@[0-9]@', $password);
                        $specialChars = preg_match('@[^\w]@', $password);

                        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 7) {
                            header("location:profil-edit.php?req=4");
                        } else {
                            $sqlPassword = "UPDATE users Set password=:password WHERE id=:id";
                            $queryPassword = $pdo->prepare($sqlPassword);
                            $queryPassword->execute(
                                array(
                                    'password' => $_POST['password_baru'],
                                    'id' => $_SESSION['user']['id']
                                )
                            );

                            header("Location:profil-edit.php?req=6");
                        }
                    }
                }
            } else {
                header("Location:profil-edit.php?req=00");
            }
        }
    }
}

?>