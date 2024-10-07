
<?php

if(isset($_SESSION['email']) && isset($_SESSION['password']) && isset($_SESSION['id'])){
  $user_id = $conn -> real_escape_string($_SESSION['id']);
}else{
  $_SESSION["msg"] = "Please first Login and continue your work";
  header("location:".SITE_URL."login.php");
  exit();
}

?>