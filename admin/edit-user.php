<?php include("templats/menu.php") ?>
<?php include("../configs/isLogin.php");?>

<?php
  if(isset($_POST['submit'])){

    $full_name = $conn -> real_escape_string($_POST['full_name']);
    // $email = $conn -> real_escape_string($_POST['email']);

    // $q3 = "SELECT * FROM users WHERE email = '$email'";
    // $res = $conn->query($q3);

    // if($res->num_rows > 0){
    //   $user = $res->fetch_assoc();
    //   if($user_id != $user['id']){
    //     $_SESSION["msg"] = "Already Exist an another account on this email. Please! use different email.";
    //     header("location:".SITE_URL."edit-user.php");
    //     exit();
    //   }
    // }

    $phone_no = $conn -> real_escape_string($_POST['phone_no']);
    $dob = $conn -> real_escape_string($_POST['dob']);
    $id = $conn -> real_escape_string($_POST['submit']);
    
    if(empty($_FILES['photo']['name'])){
      
      $q = "UPDATE users SET full_name = '$full_name', dob = '$dob' WHERE id = $id";

    }else{
      
      $photo = $conn -> real_escape_string($_FILES['photo']['name']);

      $ext = end(explode(".", $photo));

      $photo = "img".rand(00000000, 99999999).time().".".$ext;

      $source_path = $_FILES['photo']['tmp_name'];
      $destination_path = "../images/profile/".$photo;

      $upload = move_uploaded_file($source_path, $destination_path);
      if($upload == false){
        $_SESSION['msg'] = "FAILED to upload photo";
        header("location:".SITE_URL."edit-user.php");
        exit();
      }

      $q = "UPDATE users SET full_name = '$full_name', dob = '$dob', photo = '$photo' WHERE id = $id";

    }
    

    

    $res = $conn->query($q);
    if($res = true){
      $_SESSION["msg"] = "Successfully Updated...";
      $_SESSION['email'] = $conn -> real_escape_string($email);
      header("location:".SITE_URL."profile.php");
    }
  }

  $id = $conn -> real_escape_string($user_id);

  $q = "SELECT * FROM users WHERE id = $id";

  $user = $conn->query($q);

  $user = $user->fetch_assoc();

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
    <h2>Edit User</h2>
    
    <form method="POST" action="" class="needs-validation" enctype="multipart/form-data" novalidate>
      <div class="mb-3">
        <label for="full_name" class="form-label">Full Name</label>
        <input  placeholder="Full Name" type="text" class="form-control" id="full_name" name="full_name" value="<?php echo $user['full_name'] ?>" required>
      </div>
      
      <div class="mb-3">
        <label for="birth_date" class="form-label">Birth Date</label>
        <input value="<?php echo $user['dob'] ?>" placeholder="Birth Date" type="date" class="form-control" id="birth_date" name="dob" required>
      </div>

      <div class="mb-3">
        <label for="photo" class="form-label">Image</label>
        <input value="../images/profile<?php echo $user['photo'] ?>" type="file" class="form-control" id="photo" name="photo" accept="image/*">
      </div>
      
      <button name="submit" value="<?php echo $user['id'] ?>" type="submit" class="btn btn-primary mb-3">Update</button>
      
    
    </form>

  </div>
</div>



<?php include("templats/footer.php") ?>