<?php

//$hostname = "localhost";
//$username = "root";
//$password = "";
//$database = "fieldworker";
//$hostname = "fieldworker.db.11839441.hostedresource.com";
//$username = "fieldworker";
//$password = "Xerces@1985";
//$database = "fieldworker";
$hostname = "localhost";
$username = "r3narivv_dbuser";
$password = "Xerces@1985";
$database = "r3narivv_call_log";

mysql_connect($hostname,$username,$password);
mysql_select_db($database) or die("Something went wrong in database!");

?>