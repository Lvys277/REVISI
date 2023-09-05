<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sembarang - Responsive Social Media Website Using HTML, CSS & JavaScript</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<style>
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
    <div class="sidebar">
        <a href="index.php" class="menu-item ">
            <span><i class="uil uil-home"></i></span> <h3 style="margin-top:7px;">Beranda</h3>
        </a>
        <a href="profil-utama.php?id=<?php echo $_SESSION['user']['id']; ?>" class="menu-item">
            <span><i class="uil uil-user-circle"></i></span> <h3 style="margin-top:7px;">Profile</h3>
        </a>
        <a href="profil-edit.php?req=0" class="menu-item">
            <span><i class="uil uil-setting"></i></span> <h3 style="margin-top:7px;">Setelan Profil</h3>
        </a>     
        
        <a href="pesan/users.php" class="menu-item">
            <span><i class="uil uil-message"></i></span> <h3 style="margin-top:7px;">pesan</h3>
            <a href="logout.php" class="menu-item" id="notifikasi">
            <span><i class="uil uil-signout"><small class="notifikasi-count"></small></i></span> <h3 style="margin-top:7px;">Keluar</h3>
        </a>
        </a> 
        
    </div>
    
</body>
</html>