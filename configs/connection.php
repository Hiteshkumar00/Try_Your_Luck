<?php

session_start();

define("SITE_URL", "http://localhost/tryyourluck/admin/");
define("SERVER_NAME", "127.0.0.1:3307");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "try_your_luck");


//for admin authentication
define("admin", "hitesh_kumar");
define("ad_pass", md5("hitesh00"));

$conn = new mysqli(SERVER_NAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

?>