<?php

/* Production Config */

// $db_host = "Localhost";
// $db_uname = "lixibvmm_developer";
// $db_pass = "P@ssword123";
// $db_name = "lixibvmm_cn_ecommerce";

/* Development Config */

$db_host = "localhost";
$db_uname = "root";
$db_pass = "";
$db_name = "cn_ecommerce";


$conn = new mysqli($db_host, $db_uname, $db_pass, $db_name);
?>