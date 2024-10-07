
<nav class="navbar navbar-expand-lg bg-body-light sticky-top mb-3 border-bottom">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><i class="fa-solid fa-chess-queen"></i></a>
    <a class="navbar-brand navbar-brand-title" href="index.php">Try Your Luck</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        <a class="nav-link" href="winners.php">Winners</a>
        
        <?php if(isset($_SESSION['email']) && isset($_SESSION['password']) && isset($_SESSION['id'])){ ?>
          <a class="nav-link" href="tickets.php">Tickets</a>
          <a class="nav-link" href="profile.php">Profile</a>
          <a class="nav-link" href="logout.php">Log Out</a>
        <?php } ?>
        
        
        <?php if(empty($_SESSION['id']) && empty($_SESSION['admin'])){ ?>
          <a class="nav-link" href="login.php">Log In</a>
          <a class="nav-link" href="signup.php">Sign Up</a>
          <a class="nav-link" href="admin_login.php">Admin</a>
        <?php } ?>
        

        <?php if(isset($_SESSION['admin']) && isset($_SESSION['ad_pass'])){
          if(($_SESSION['admin'] == admin )&& ($_SESSION['ad_pass'] == ad_pass)){ ?>
            <a class="nav-link" href="users.php">Users</a>
            <a class="nav-link" href="add-item.php">Add Item</a>
            <a class="nav-link" href="logout.php">Log Out</a>
        <?php }} ?>
        

      </div>
    </div>
  </div>
</nav>


 