<?php include("templats/menu.php") ?>


<?php 
  if(isset($_POST['submit'])){

    $email =  $conn -> real_escape_string($_POST['email']);
    $password =  $conn -> real_escape_string($_POST['password']);

    $q = "SELECT * FROM users WHERE email = '$email'";
    $res = $conn->query($q);
    if($res->num_rows != 1){
      $_SESSION["msg"] = "Not Exist any user for this email.";
      header("location:".SITE_URL."signup.php");
      exit();
    }

    $otp = rand(0000, 9999);
    $subject = "Forgot password";
    $body ='<div style="font-size: 2rem;">Your OTP is <br><br>
    <b style="color: blue;">'.$otp.'</b> </div>';

    include("../configs/email-send.php");

    $_SESSION['temp_email'] = $email;
    $_SESSION['temp_pass'] = md5($password);
    $_SESSION['temp_otp'] = $otp;
    $_SESSION['msg'] = "We sent OTP on your email.";
    header("location:".SITE_URL."verify-email.php");
    exit();
  } 

?>

<div class="row offset-md-2 mt-3">
  <?php
  if(isset($_SESSION['msg'])){
    $msg = $_SESSION['msg'];
    echo "<p>$msg</p>";
    unset($_SESSION['msg']);
  }
  ?>
  
  <div class="col col-md-8">
    <h2>Forgot Password</h2>
    
    <form method="POST" action="" class="needs-validation" novalidate>
      
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input  placeholder="Email" type="email" class="form-control" id="email" name="email" required>
      </div>
      
      <div class="mb-3">
        <label for="password" class="form-label">New Password</label>
        <input placeholder="Password" type="password" class="form-control" id="password" name="password" required>
      </div>
      
      <button name="submit" value="yes" type="submit" class="btn btn-primary mb-3">Get Otp</button>
      
    </form>

  </div>
</div>

<?php include("templats/footer.php") ?> 