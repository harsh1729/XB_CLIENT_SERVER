<?php

$hostname = "localhost";
$username = "r3narivv_dbuser";
$password = "Xerces@1985";
$database = "r3narivv_call_log";
$db = mysqli_connect($hostname,$username,$password,$database);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>