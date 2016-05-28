<?php
include("../db_connection.php");
session_start();
$agentId =  $_REQUEST['agentid'];
$deviceId = $_REQUEST['deviceid'];
$adminId = $_SESSION['userId'];

$dtObj = new DateTime("now");
$dtObj->setTimeZone(new DateTimeZone("Asia/Kolkata"));
$daytime = $dtObj->format("Y-m-d H:i:s");

$insertQuery = "insert into agentdevicemapping (agentId,deviceId,mappedBy,daytime) values (".$agentId.",".$deviceId.",".$adminId.",'".$daytime."')";
mysql_query($insertQuery);
$insertId = mysql_insert_id();

if($insertId > 0)
	$mappedStatus = true;
else
	$mappedStatus = false;
	
echo json_encode($mappedStatus);

?>