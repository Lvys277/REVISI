<?php
session_start();?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <title>Sosmed</title>
</head>
<style>
  .bg {
    width: 700px;
    height: 125px;
    border-radius: 15px;
    background-color: white;
    box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
  }

  .bg1 {
    padding-left: 0;
    padding-bottom: 15px;
    margin-left: 21px;
    margin-bottom: -10px;
    width: 700px;
    height: auto;
    border-radius: 15px;
    background-color: white;
    box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);

  }

  button {
    margin-top: 10px;
  }

  .a {
    color: rgb(124, 124, 124);

  }

  .a:hover {
    color: white;
  }

  /* Import Google font - Poppins */
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

  ::selection {
    color: #fff;
    background: #4671EA;
  }

  .wrapper {
    width: 470px;
    background: #fff;
    border-radius: 5px;
    padding: 5px;

  }

  .wrapper h2 {
    color: #4671EA;
    font-size: 28px;
    text-align: center;
  }

  .wrapper textarea {
    width: 100%;
    resize: none;
    height: 159px;
    outline: none;
    padding: 15px;
    font-size: 16px;
    margin-top: 20px;
    border-radius: 5px;
    max-height: 330px;
    caret-color: #4671EA;
    border: 1px solid #bfbfbf;
  }

  textarea::placeholder {
    color: #b3b3b3;
  }

  textarea:is(:focus, :valid) {
    padding: 14px;
    border: 2px solid #4671EA;
  }

  textarea::-webkit-scrollbar {
    width: 0px;
  }
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

:root {
--color-white: hsl(252, 30%, 100%);
--color-light: hsl(252, 30%, 95%);
--color-gray: hsl(252, 15%, 65%);
--color-primary: hsl(252, 75%, 60%);
--color-secondary: hsl(252, 100%, 90%);
--color-success: hsl(120, 95%, 65%);
--color-danger: hsl(0, 95%, 65%);
--color-dark: hsl(252, 30%, 17%);
--color-black: hsl(252, 30%, 10%);

--border-radius: 2rem;
--card-border-radius: 1rem;
--btn-padding: 0.6rem 2rem;
--search-padding: 0.6rem 1rem;
--card-padding: 1rem;

--sticky-top-left: 5.4rem;
--sticky-top-right: -18rem;
}


*,
*::before,
*::after {
margin: 0;
padding: 0;
outline: 0;
box-sizing: border-box;
text-decoration: none;
list-style: none;
border: none;
font-family: "Poppins", sans-serif;
}
body {
text-decoration: none;
color: var(--color-dark);
background: var(--color-light);
overflow-x: hidden;
}

.container {
width: 80%;
margin: 0 auto;
}



img {
display: block;
width: 100%;
}

.btn {
display: inline-block;
padding: var(--btn-padding);
font-weight: 500;
border-radius: var(--border-radius);
cursor: pointer;
transition: all 300ms ease;
font-size: 0.9rem;
}

.btn:hover {
opacity: 0.8;
}

.btn-primary {
background: var(--color-primary);
color: white;
}

.text-bold {
font-weight: 500;
}

.text-muted {
color: var(--color-gray);
}


nav {
width: 100%;
background: var(--color-white);
padding: 0.7rem 0;
position: fixed;
top: 0;
z-index: 10;
box-shadow: 0 1px 5px rgba(0,0,0,0.1);
}

nav .container {
display: flex;
align-items: center;
justify-content: space-between;
}

nav .search-bar {
background: var(--color-light);
border-radius: var(--border-radius);
padding: var(--search-padding);
}

nav .search-bar input[type="search"] {
background: transparent;
width: 30vw;
margin-left: 1rem;
font-size: 0.9rem;
color: var(--color-dark);
}

nav .search-bar input[type="search"]::placeholder {
color: var(--color-gray);
}

nav .create {
display: flex;
align-items: center;
gap: 2rem;
}

/* ================= SIDEBAR ==================== */
main {
position: relative;
top: 5.4rem;

}

main .container {
display: grid;
grid-template-columns: 20vw auto ;
column-gap: 2rem;
position: relative;
}

main .container .left {
height: max-content;
position: sticky;
top: var(--sticky-top-left);
}

main .container .left .profile {
padding: var(--card-padding);
background: var(--color-white);
border-radius: var(--card-border-radius);
display: flex;
align-items: center;
column-gap: 1rem;
width: 100%;
box-shadow: 0 1px 5px rgba(0,0,0,0.1);
}


.left .sidebar {
margin-top: 1rem;
background: var(--color-white);
border-radius: var(--card-border-radius);
box-shadow: 0 1px 5px rgba(0,0,0,0.1);
}

.left .sidebar .menu-item {
display: flex;
align-items: center;
height: 4rem;
cursor: pointer;
transition: all 300ms ease;
position: relative;
text-decoration:none;
color: black;
}

.left .sidebar .menu-item:hover {
background: var(--color-light);
}

.left .sidebar i {
font-size: 1.4rem;
color: var(--color-dark);
margin-left: 2rem;
position: relative;
}

.left .sidebar i .notifikasi-count {
background: var(--color-danger);
color: white;
font-size: 0.7rem;
width: fit-content;
border-radius: 0.8rem;
padding: 0.rem 0.4rem;
position: absolute;
top: -0.2rem;
right: -0.3rem;
}

.left .sidebar h3 {
margin-left: 1.5rem;
font-size: 1rem;
}

.left .btn {
margin-top: 1rem;
width: 100%;
text-align: center;
padding: 1rem 0;
box-shadow: 0 1px 5px rgba(0,0,0,0.1);
}  
</style>

<body>
  <nav>
    <div class="container">
      <h2 style="font-weight:1000;" class="log ">
        Schwarzer Admin
      </h2>
    </div>
  </nav>

  <main>
    <div class="container">
      <div class="left">
        <a style="text-decoration:none;color:black;" class="profile">
        <?php
$pdo = new PDO('mysql:host=localhost; dbname=pkl',"root","");
$sql = "SELECT  nama FROM admin WHERE id=:id";
$query = $pdo->prepare($sql);
$query->execute(array('id' => $_SESSION['admin']['id']));
$topik = $query->fetch();
?>

    <div style="font-size:30px;font-family:arial;font-weight:bold;" class="handle">
        <?php echo htmlentities($topik['nama']);?><br>
    </div>

        </a>
        <div class="sidebar">
        <a href="pengguna.php" class="menu-item ">
            <span><i class="uil uil-user"></i></span> <h3 style="margin-top:7px;">Pengguna</h3>
        </a>
        <a href="topik.php" class="menu-item">
            <span><i class="uil uil-upload"></i></span> <h3 style="margin-top:7px;">Topik</h3>
        </a>     
        <a href="komentar.php" class="menu-item">
            <span><i class="uil uil-comment"></i></span> <h3 style="margin-top:7px;">Komentar</h3>
        </a> 
        <a href="pesan.php" class="menu-item">
            <span><i class="uil uil-message"></i></span> <h3 style="margin-top:7px;">Pesan</h3>
        </a> 
        <a href="logout.php" class="menu-item" id="notifikasi">
            <span><i class="uil uil-signout"><small class="notifikasi-count"></small></i></span> <h3 style="margin-top:7px;">Keluar</h3>
        </a>
    </div>
      </div>
      <div class="middle">

      <div class="card">
              <div class="card-header">
        DATA PESAN</div>
<div class="card-body"> 
    <table class="table table-bordered" id="myTable">
        <thead>
            <tr><th scope="col">ID</th>                          
                <th scope="col">NAMA</th>
                <th scope="col">PESAN</th>
                <th scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $koneksi = mysqli_connect("localhost","root","","pkl");
       
            $query = mysqli_query($koneksi, "SELECT * FROM messages");
            while($row = mysqli_fetch_array($query)){
            ?>
        <tr>    
                <td><?php echo $row['msg_id'] ?></td>
                <td><?php echo $row['nama'] ?></td>   
                <td><?php echo $row['msg'] ?></td>
              <td class="text-center">   
                    <a href="hapus-pesan.php?id=<?php echo $row['msg_id']?>" class="btn btn-sm btn-danger">HAPUS</a>    
               </td>
            </tr>
            <?php
            }?>
            </tbody>
        </table>
        </div>
        </div>
      
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

</body>

</html>