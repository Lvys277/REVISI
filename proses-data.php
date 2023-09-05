<?php
if (!empty($_POST)){
    echo "<p>Nama: ".$_POST['nama'].'</p>';
    echo "<p>Email: ".$_POST['email'].'</p>';
    echo "<p>Jenis kelamin: ";
    if($_POST ['jk'] == 'L'){
        echo "laki-laki";
    }else{
        echo "perempian";
    }
    echo "</p>";
    echo "<p>Umur: ".$_POST['umur'].'</p>';
    echo "<p>Alamat: ".$_POST['Alamat'].'</p>';
}
if(!empty($_GET)){
    echo "anda sedang mencari data dengan nama".$_GET['nama'];
}
?>