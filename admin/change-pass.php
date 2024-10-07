<?php include("templats/menu.php") ?>
<?php include("../configs/isLogin.php");?>

<?php

  $id = $conn -> real_escape_string($_POST['id']);

  $q = "SELECT * FROM users WHERE id = $id";

  $user = $conn->query($q);

  $user = $user->fetch_assoc();

  if(isset($_POST['submit'])){

    $currpass = $conn -> real_escape_string($_POST['currpass']);
    $newpass = $conn -> real_escape_string($_POST['newpass']);
    $confpass = $conn -> real_escape_string($_POST['confpass']);

    if(md5($currpass) == $user['password']){
      
      if($newpass == $confpass){
        $newpass = $conn -> real_escape_string(md5($newpass));
        $q2 = "UPDATE users SET password = '$newpass'  WHERE id = $id";
        $res = $conn->query($q2);
        if($res == true){
          $_SESSION['password'] = $conn -> real_escape_string($newpass);
          $_SESSION['msg'] = "Successfully changed password...";
          header("location:".SITE_URL."profile.php");
          exit();
        }
      }else{
        $_SESSION['msg'] = "New and Conform password doesn't match!";
      }

    }else{
      $_SESSION['msg'] = "Current password is wrong!";
    }
    
    if(isset($_SESSION['msg'])){
      $msg = $_SESSION['msg'];
      echo "<p>$msg</p>";
      unset($_SESSION['msg']);
    }
  }

?>


<div class="row offset-md-2 mt-3">
  <div class="col col-md-8">
    <h3><?php echo $user['full_name'] ?></h3>
    
    <form method="POST" action="" class="needs-validation mt-3" novalidate>
      
      <div class="mb-3">
        <label for="currpass" class="form-label">Current password</label>
        <input placeholder="Current password" type="password" class="form-control" id="currpass" name="currpass" required>
      </div>
      
      <div class="mb-3">
        <label for="new-pass" class="form-label">New passroed</label>
        <input placeholder="password" type="password" class="form-control" id="new-pass" name="newpass" required>
      </div>
      
      <div class="mb-3">
        <label for="conf-pass" class="form-label">Conform password</label>
        <input placeholder="Conform password" type="password" class="form-control" id="conf-pass" name="confpass" required>
      </div>
      
      <input name="id" type="hidden" value="<?php echo $user['id'] ?>">
      <button name="submit" value="yes" type="submit" class="btn btn-success mb-3">Change Password</button>
    
    </form>

  </div>
</div>



<?php include("templats/footer.php") ?>