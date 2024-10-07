<?php
  include("../configs/connection.php");
  include("../configs/isLogin.php");
?>




<?php 

if(isset($_SESSION['id']) && isset($_POST['item_id']) && isset($_POST['razorpay_payment_id'])){
  $user_id = $conn -> real_escape_string($_SESSION['id']);
  $item_id = $conn -> real_escape_string($_POST['item_id']);
  $payment_id = $conn -> real_escape_string($_POST['razorpay_payment_id']);

  $q = "INSERT INTO `tickets` (`pay_id`, `user_id`, `item_id`) VALUES ('$payment_id', '$user_id', '$item_id')";

  $res = $conn->query($q);
  if($res){
    header("location:".SITE_URL."tickets.php");
  }else{
    header("location:".SITE_URL."index.php");
  }
}else{
  header("location:".SITE_URL."index.php");
}

?>