<?php 
  session_start();
  include_once "php/config.php";

?>
<?php include_once "header.php"; ?>

<body>
  <div class="wrapper">
  
    <section class="users">
      <header>
        
        <div class="content">
        <a href="../index.php" style="margin-right: 10px;"class="back-icon"><i class="fas fa-arrow-left"></i></a>
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['user']['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="../image/<?php echo $row['gambar']; ?>" alt="">
          <div class="details">
            <span ><?php echo $row['nama']?></span>
          </div>
        </div>
        
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div style="color:white;" class="users-list">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
