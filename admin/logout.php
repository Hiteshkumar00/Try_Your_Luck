<?php
session_start();
session_destroy();

include("../configs/connection.php");

$_SESSION['msg'] = "Successfully logged out..";

header("location:".SITE_URL."login.php");

?>