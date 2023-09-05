<?php

// memanggil file koneksi.php untuk melakukan koneksi database
$koneksi = mysqli_connect("localhost","root","","pkl");

if($koneksi){
    echo "";
}else{
    echo "Koneksi Gagal :".mysqli_connect_error();
}


	// membuat variabel untuk menampung data dari form
  
  $gambar = $_FILES['gambar']['name'];
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];


if ($_POST['password'] != $_POST['password2']){
  echo 'Password dan ketik ulang password harus sama';
}else{

  if($gambar != "") {
  $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gambar']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$gambar; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'image/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO users (nama, email, password,gambar ) VALUES ('$nama','$email','$password','$nama_gambar_baru')";
                  $result = mysqli_query($koneksi, $query);
                
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_error($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='login1.php';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg,jpeg atau png.');window.location='daftar1.php';</script>";
            }
} else {
   $query = "INSERT INTO users (nama, email, password,gambar) VALUES ('$nama','$email','$password','$nama_gambar_baru')";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_error($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='login1.php';</script>";
                  }
                  
               

                  
                  
                  
                }}
                
                   