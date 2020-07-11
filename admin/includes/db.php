<?php


$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "blog";

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
$conn->set_charset("utf8");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


?>
