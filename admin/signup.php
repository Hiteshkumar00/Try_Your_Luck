<?php include("templats/menu.php") ?>

<?php
  if(isset($_POST['submit'])){
    $full_name = $conn -> real_escape_string($_POST['full_name']);
    $email = $conn -> real_escape_string($_POST['email']);   
    $dob = $conn -> real_escape_string($_POST['dob']);
    $tempPass = rand(000000, 999999);

    $q3 = "SELECT * FROM users WHERE email = '$email'";
    $res = $conn->query($q3);
    if($res->num_rows > 0){
      $_SESSION["msg"] = "Already Exist an account on this email. Please! use different email.";
      header("location:".SITE_URL."signup.php");
      exit();
    }

    
    $subject = "Registration successfull!";
    $body = '<div style="font-size: 2rem;">Your Password is <br><br>
    <b style="color: blue;">'.$tempPass.'</b> </div>';

    if(empty($_FILES['photo']['name'])){

      include("../configs/email-send.php");
      
      $password = $conn -> real_escape_string(md5($tempPass));
      
      $q = "INSERT INTO users (full_name, email, phone_no, dob, password) VALUES ( '$full_name', '$email', '$phone_no', '$dob', '$password')";

    }else{
      
      $photo = $conn -> real_escape_string($_FILES['photo']['name']);

      $ext = end(explode(".", $photo));

      $photo = "img".rand(00000000, 99999999).time().".".$ext;

      $source_path = $_FILES['photo']['tmp_name'];
      $destination_path = "../images/profile/".$photo;

      $upload = move_uploaded_file($source_path, $destination_path);
      if($upload == false){
        $_SESSION['msg'] = "FAILED to upload photo";
        header("location:".SITE_URL."signup.php");
        exit();
      }

      include("../configs/email-send.php");
      
      $password = $conn -> real_escape_string(md5($tempPass));

      $q = "INSERT INTO users (full_name, email, phone_no, dob, password, photo) VALUES ( '$full_name', '$email', '$phone_no', '$dob', '$password', '$photo')";

    }

    $res = $conn->query($q);

    if($res == true){
      $_SESSION["msg"] = "Successfully Signed Up...";
      header("location:".SITE_URL."login.php");
      exit();
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
  ?>

  <div class="col col-md-8">
    <h2>Sign Up</h2>
    
    <form method="POST" action="" class="needs-validation" enctype="multipart/form-data" novalidate>
      <div class="mb-3">
        <label for="full_name" class="form-label">Full Name</label>
        <input  placeholder="Full Name" type="text" class="form-control" id="full_name" name="full_name" required>
      </div>
      
      <div class="mb-3">
        <label for="birth_date" class="form-label">Birth Date</label>
        <input placeholder="Birth Date" type="date" class="form-control" id="birth_date" name="dob" required>
      </div>
      
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input  placeholder="Email" type="email" class="form-control" id="email" name="email" required>
      </div>

      <div class="mb-3">
        <label for="photo" class="form-label">Image</label>
        <input accept="image/*" type="file" class="form-control" id="photo" name="photo">
      </div>
      
      <button name="submit" value="yes" type="submit" class="btn btn-primary mb-3">Sign Up</button>
      
    
    </form>

  </div>
</div>



<?php include("templats/footer.php") ?>