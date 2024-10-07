<?php include("templats/menu.php") ?>



<?php
  

  if(isset($_POST['submit'])){
    $username = $conn -> real_escape_string($_POST['username']);
    $ad_pass = $conn -> real_escape_string(md5($_POST['password']));

    if((admin == $username) && (ad_pass == $ad_pass)){
      $_SESSION["admin"] = $username;
      $_SESSION["ad_pass"] = $ad_pass;

      header("location:".SITE_URL."users.php");
      exit();
    }else{
      $_SESSION["msg"] = "username or password didn't match";
    }
  }

?> 



<div class="row offset-md-2 mt-3">
  <?php
  if(isset($_SESSION['msg'])){
    $msg = $_SESSION['msg'];
    echo "<p>$msg</p>";
    unset($_SESSION['msg']);
  }
  session_destroy();
  ?>

  <div class="col col-md-8">

    <h2>Admin</h2>
    
    <form method="POST" action="" class="needs-validation" novalidate>
      
      <div class="mb-3">
        <label for="username" class="form-label">username</label>
        <input  placeholder="Username" type="text" class="form-control" id="username" name="username" required>
      </div>
      
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input placeholder="Password" type="password" class="form-control" id="password" name="password" required>
      </div>
      
      <button name="submit" value="yes" type="submit" class="btn btn-primary mb-3">Log In</button>
      
    
    </form>

  </div>
</div>

<?php include("templats/footer.php") ?> 