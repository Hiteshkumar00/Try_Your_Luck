<?php include("templats/menu.php") ?>
<?php include("../configs/isLogin.php");?>

<?php

  $q = "SELECT * FROM users WHERE id = $user_id";

  $res = $conn->query($q);

  if($res->num_rows == 1){
    $user = $res->fetch_assoc();
  }else{
    $_SESSION["msg"] = "Please first Login and continue your work";
    header("location:".SITE_URL."login.php");
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

  <div class="card">
      <img src="../images/profile/<?php echo $user['photo'] ?>" class="card-img-top profile-img" alt="Image">
    <div class="card-body">
      <h5 class="card-title">Name: <?php echo $user['full_name'] ?></h5>
      <p class="card-text">ID : <?php echo $user['id'] ?></p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Email : <?php echo $user['email'] ?></li>
      <li class="list-group-item">DOB : <?php echo $user['dob'] ?></li>
    </ul>
    <div class="card-body">
      <form class="btn-form me-3 mb-3" action="edit-user.php" method="post"><button class="btn btn-warning btn-sm" name="id" value="<?php echo $user['id'] ?>" type="submit">Edit</button></form>
      <form class="btn-form" action="change-pass.php" method="post"><button class="btn btn-danger btn-sm" name="id" value="<?php echo $user['id'] ?>" type="submit">Change Password</button></form>
      <br>
      <a href="forgot-pass.php">forgot password?</a>
    </div>
  </div>

</div>
</div>

<?php include("templats/footer.php") ?> 