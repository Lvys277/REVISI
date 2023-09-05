<?php
    session_start();
    include_once "config.php";

    $outgoing_id = $_SESSION['user']['unique_id'];

   
    $sql = "SELECT * FROM users WHERE  unique_id != {$outgoing_id}";
    $output = "";

    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            $sql2 = "SELECT * FROM messages WHERE (
                    outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                    OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 5";
            $query2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($query2);
            (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="";
            (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
            (mysqli_num_rows($query2) > 0) ? $result1 = $row2['nama'] : $result1 ="";
            (strlen($result) > 28) ? $msg1 =  substr($result, 0, 28) . '...' : $msg1 = $result1;
            (mysqli_num_rows($query2) > 0) ? $result2 = '<img style="border-radius:50%;margin-top:-18px;width:40px;height:40px;" src="image/'. $row2['gambar'] .'" alt="">' : $result2 ="";
            (strlen($result) > 28) ? $msg2 =  substr($result, 0, 28) . '...' : $msg2 = $result2;


            $output .= '<a href="pesan/chat.php?user_id='. $row['unique_id'] .'">
                        <div class="content">
                        <span>'. $msg2.'</span>
                        <div class="details">
                            <span style="color:white;">'. $msg1.'</span>
                        
                            <p>'. $msg .'</p>

                        </div>
                        </div>
                       
                    </a>';
    
    
        }
    }else{
        $output .= '<p style="color:white;">Tidak ada pengguna yang ditemukan</p>';
    }
    echo $output;
?>