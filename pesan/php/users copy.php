<?php
    session_start();
    include_once "config.php";

    $id = $_SESSION['user']['unique_id'];
    $sql = "SELECT messages.*, users.nama, users.gambar FROM messages
    INNER JOIN users ON messages.incoming_msg_id=users.unique_id where messages.incoming_msg_id = $id  ORDER BY msg_id DESC limit 5";
    
    $output = "";

    $query = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        

        $output .= '<a href="chat.php?user_id='. $row['unique_id'] .'">
                    <div class="content">
                    <img src="../image/'. $row['gambar'] .'" alt="">
                    <div class="details">
                        <span>'. $row['nama'].'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                   
                </a>';


    }
    //  $id=$_SESSION['user']['unique_id'];
    //  // mengambil data 5 pesan terbaru 
    // //  $sql = "SELECT * FROM messages where incoming_msg_id = $id  ORDER BY msg_id DESC limit 5";
    // //  $pdo = new PDO('mysql:host=localhost; dbname=pkl', "root", "");
    // $sql = "SELECT messages.*, users.nama, users.gambar FROM messages
    //     INNER JOIN users ON messages.incoming_msg_id=users.unique_id where messages.incoming_msg_id = $id  ORDER BY msg_id DESC limit 5";
    //      $query = $pdo->prepare($sql);
    //      $query->execute();
        
//              while ($row = $query->fetch()) {
             
  
// echo $row['nama'];
       
//     }
echo $output;
    ?>
