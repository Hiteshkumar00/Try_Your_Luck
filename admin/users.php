<?php include("templats/menu.php"); ?>
<?php include("../configs/isAdmin.php"); ?>

<?php

  if(isset($_SESSION['msg'])){
    $msg = $_SESSION['msg'];
    echo "<p>$msg</p>";
    unset($_SESSION['msg']);
  }
  if(isset($_SESSION['msg2'])){
    $msg = $_SESSION['msg2'];
    echo "<p>$msg</p>";
    unset($_SESSION['msg2']);
  }
?>

<?php
  
  $q = "SELECT * FROM users ORDER BY id DESC";
  
  $users = $conn->query($q);

  $users = $users->fetch_all(MYSQLI_ASSOC);

?>

<?php foreach($users as $user){ ?>
  <div class="card mb-3">
    <div class="card-header">
      <?php echo $user['full_name'] ?>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col col-12 col-md-4 user-img-div text-center">
          <img class="user-img img-fluid rounded" src="../images/profile/<?php echo $user['photo'] ;?>" alt="Image">
        </div>
        <div class="col col-12 col-md-8">
          <h5 class="card-title">ID : <?php echo $user['id'] ?></h5>
          <h5 class="card-title">NAME : <?php echo $user['full_name'] ?></h5>
          <p class="card-text">Date Of Birth : <?php echo $user['dob'] ?></p>
          <p class="card-text">Email : <?php echo $user['email'] ?></p>
        </div>
      </div>     
    </div>
  </div>
<?php } ?>

<?php include("templats/footer.php") ?> 