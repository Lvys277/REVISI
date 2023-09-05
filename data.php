<?php

session_start(); 
    $id=$_SESSION['user']['unique_id'];
    $connect = mysqli_connect('localhost', 'root', '', 'pkl');
    
    
    $query= mysqli_query($connect, "Select Count(incoming_msg_id) as jumlah From messages where incoming_msg_id = $id and status = true");
    
    
    $hasil = mysqli_fetch_array($query);
    
    
    echo json_encode(array('jumlah' => $hasil['jumlah']));
    
    ?>