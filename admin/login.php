<?php include("templats/menu.php") ?>



<?php

  

  if(isset($_POST['submit'])){
    $email = $conn -> real_escape_string($_POST['email']);
    $password = $conn -> real_escape_string(md5($_POST['password']));

    $q = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

    $res = $conn->query($q);

    if($res->num_rows == 1){
      $user = $res->fetch_assoc();

      $_SESSION['email'] = $conn -> real_escape_string($email);
      $_SESSION['id'] = $conn -> real_escape_string($user['id']);
      $_SESSION['password'] = $conn -> real_escape_string($password);

      $_SESSION["msg2"] = "Successfully Logged In...";
      header("location:".SITE_URL."index.php");
      exit();
    }else{
      $_SESSION["msg"] = "email or password didn't match";
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
    <h2>Log In</h2>
    
    <form method="POST" action="" class="needs-validation" novalidate>
      
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input  placeholder="Email" type="email" class="form-control" id="email" name="email" required>
      </div>
      
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input placeholder="Password" type="password" class="form-control" id="password" name="password" required>
      </div>
      
      <button name="submit" value="yes" type="submit" class="btn btn-primary mb-3">Log In</button>

      <br>
      <a href="forgot-pass.php">forgot password?</a>
      
    
    </form>

  </div>
</div>

<?php include("templats/footer.php") ?> 

