<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="#">Forum PHP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <?php
        if(!isset($_SESSION['user'])  || empty($_SESSION['user'])) {
        ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="daftar.php">Registrasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="login.php">Login</a>
        </li>
        <?php } else {?>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="tambah-topik.php">Post Topik</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="profil.php">Profil</a>
        </li>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Logout.php">Logout</a>
        </li>
          <?php }?>
      </ul>
     
    </div>
  </div>
</nav>