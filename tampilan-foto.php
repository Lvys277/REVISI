<?php
            require_once 'cek-akses.php';
            $id = $_SESSION['user']['id'];
            $pdo = new PDO('mysql:host=localhost; dbname=pkl',"root","");
            $sql = "SELECT * FROM users WHERE id=:id";
            $query = $pdo->prepare($sql);
            $query->execute(array('id' => $_SESSION['user']['id']));
            $row = $query->fetch();
            ?>

      

        
