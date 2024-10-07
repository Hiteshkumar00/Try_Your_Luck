<?php include("../configs/connection.php") ?>

<?php 

if(isset($_POST['id'])){
  $id = $conn -> real_escape_string($_POST['id']);
  $q = "DELETE FROM users WHERE id = $id";

  $res = $conn->query($q);

  if($res == true){
    $_SESSION['msg'] = "User successfully deleted.";
  }else{
    $_SESSION['msg'] = "Something wrong please try again.";
  }

  header("location:".SITE_URL."users.php");
}

?>

