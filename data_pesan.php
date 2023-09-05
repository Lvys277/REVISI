<?php
session_start();
 $id=$_SESSION['user']['unique_id'];
 // mengambil data 5 pesan terbaru 
 $sql = "SELECT * FROM messages where incoming_msg_id = $id and status = true ORDER BY msg_id DESC limit 5";
 $pdo = new PDO('mysql:host=localhost; dbname=pkl', "root", "");
     $query = $pdo->prepare($sql);
     $query->execute();
    
         while ($row = $query->fetch()) {
         
if ('submit'){
    $sql1 = "UPDATE messages SET status = false where msg = :stts";
    $query1 = $pdo->prepare($sql1);
     $query1->execute( array(
        'stts' => $row['msg']
    ));
    $id=$row['outgoing_msg_id'];
    header("location:pesan/chat.php?user_id=$id");
}}
?>