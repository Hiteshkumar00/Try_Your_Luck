<?php
  include("../configs/connection.php");
  include("../configs/isLogin.php");
?>

<?php

    $user_id = $conn -> real_escape_string($_SESSION['id']);
    $email = $conn -> real_escape_string($_SESSION['email']);
    $password = $conn -> real_escape_string($_SESSION['password']);

    $q = "SELECT * FROM users WHERE id = $user_id AND password = '$password' AND email = '$email'";
  
    $res = $conn->query($q);

    if($res->num_rows == 1){
      $user = $res->fetch_assoc();
    }else{
      header("location:".SITE_URL."logout.php");
    }
    
    if(isset($_POST['id'])){
      $item_id = $conn -> real_escape_string($_POST['id']);
    }else{
      header("location:".SITE_URL."index.php");
    }
    
    $q2 = "SELECT * FROM items WHERE id = $item_id";
  
    $res2 = $conn->query($q2);

    if($res2->num_rows == 1){
      $item = $res2->fetch_assoc();
    }else{
      header("location:".SITE_URL."index.php");
    }
?>



<?php
  $apikey = /* here add your api */;
  $amount = $conn -> real_escape_string($item['price']);
  $oid = 'TRY'.$item_id.$user_id.'LUCK';
  $desc = $conn -> real_escape_string($item['name']);
  $logoUrl = 'https://cdn-icons-png.flaticon.com/128/11641/11641576.png';
  $userName = $conn -> real_escape_string($user['full_name']);
  $userEmail = $conn -> real_escape_string($user['email']);
?>



<form action="yes.php" method="post">
<script
   src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $apikey; ?>" // Enter the Test API Key ID generated from Dashboard → Settings → API Keys
    data-amount="<?php echo $amount * 100; ?>" // Amount is in currency subunits. Hence, 29935 refers to 29935 paise or ₹299.35.
    data-currency="INR" // You can accept international payments by changing the currency code. Contact our Support Team to enable International for your account
    data-_id="<?php echo $oid; ?>"// Replace with the order_id generated by you in the backend.
    data-buttontext="Pay with Razorpay"
    data-name="Try You Luck"
    data-description="<?php echo $desc; ?>"
    data-image=""
    data-prefill.name="<?php echo $userName; ?>"
    data-prefill.email="<?php echo $userEmail; ?>"
    data-theme.color="#698996"
></script>
<input name="user_id" value="<?php echo $user_id; ?>" type="hidden">
<input name="item_id" value="<?php echo $item_id; ?>" type="hidden">
</form>