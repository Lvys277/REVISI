<?php
    session_start();
    $id=$_SESSION['user']['unique_id'];
    $output='';
     // mengambil data 5 pesan terbaru 
    //  $sql = "SELECT * FROM messages where incoming_msg_id = $id  ORDER BY msg_id DESC limit 5";
      $pdo = new PDO('mysql:host=localhost; dbname=pkl', "root", "");
    $sql = "SELECT * FROM messages  where incoming_msg_id = $id  ORDER BY msg_id DESC limit 5";
         $query = $pdo->prepare($sql);
         $query->execute();
         
             while ($row = $query->fetch()) {
                $output .= '<a href="pesan/chat.php?user_id='. $row['outgoing_msg_id'] .'">
                <div class="content">
                <img style="border-radius:50%;" src="image/'. $row['gambar'] .'" alt="">
                <div class="details">
                    <span style="color:white;">'. $row['nama'].'</span>
                    <p>'.  $row['msg'] .'</p>
                </div>
                </div>
               
            </a>';
  

       
    }
    echo $output;
?>