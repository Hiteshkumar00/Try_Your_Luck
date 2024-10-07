<?php

if(isset($_SESSION['admin']) && isset($_SESSION['ad_pass'])){
  if(($_SESSION['admin'] == admin )&& ($_SESSION['ad_pass'] == ad_pass)){

  }else{
    $_SESSION["msg"] = "Please first Login and continue your work";
    header("location:".SITE_URL."admin_login.php");
    exit();
  }
}else{
  $_SESSION["msg"] = "Please first Login and continue your work";
  header("location:".SITE_URL."admin_login.php");
  exit();
}

?>