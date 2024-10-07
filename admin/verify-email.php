<?php include("templats/menu.php") ?>

<?php


if(empty($_SESSION['temp_email']) && empty($_SESSION['temp_pass']) && empty($_SESSION['temp_otp'])){
  header("location:".SITE_URL."login.php");
  exit();
}


if(isset($_POST['otp'])){

  if($_POST['otp'] == $_SESSION['temp_otp']){
    $email =  $conn -> real_escape_string($_SESSION['temp_email']);
    $password =  $conn -> real_escape_string($_SESSION['temp_pass']);

    $q = "UPDATE users SET password = '$password' WHERE email = '$email'";
    $res = $conn->query($q);

    unset($_SESSION['temp_otp']);
    unset($_SESSION['temp_email']);
    unset($_SESSION['temp_pass']);
    $_SESSION['msg'] = "Successfully password changed.";
    header("location:".SITE_URL."login.php");
    exit();
  }else{
    $_SESSION['msg'] = "Wrong OTP!";
  }

}

?>

<div class="row offset-md-2 mt-3">
  <div class="col col-md-8">
    <?php
      if(isset($_SESSION['msg'])){
        $msg = $_SESSION['msg'];
        echo "<p>$msg</p>";
        unset($_SESSION['msg']);
      }
    ?>

    <form method="POST" action="" class="needs-validation" novalidate>

      
      <div class="mb-3">
        <label for="otp" class="form-label">OTP</label>
        <input placeholder="Enter Your Otp" type="number" class="form-control" id="otp" name="otp" required>
      </div>
      
      <button name="submit" value="yes" type="submit" class="btn btn-primary mb-3">Verify OTP</button>
      
    </form>

  </div>
</div>
<?php include("templats/footer.php") ?>






