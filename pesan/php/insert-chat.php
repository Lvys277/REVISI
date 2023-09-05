<?php 
    session_start();
    if(isset($_SESSION['user']['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['user']['unique_id'];
        $nama = $_SESSION['user']['nama'];
        $gambar = $_SESSION['user']['gambar'];
        $iduser = $_SESSION['user']['id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg,nama,status,gambar,id_user)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}','{$nama}',true,'{$gambar}','{$iduser}')") or die();
        }
    }else{
        header("location: ../users.php");
    }


    
?>