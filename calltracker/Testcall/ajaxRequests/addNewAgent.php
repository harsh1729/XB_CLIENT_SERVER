<?php
include('../db_connection.php');
session_start();

$name 	  =	addslashes($_REQUEST['name']);
$email 	  =	addslashes($_REQUEST['email']);
$contact  =	addslashes($_REQUEST['contact']);
$dobString= addslashes($_REQUEST['dob']);
$address  =	addslashes($_REQUEST['address']);

$adminId = 	$_SESSION['userId'];

$dob = date('Y-m-d',strtotime($dobString));

$insertQuery = "insert into agents (name,email,contact,dob,address,adminId,isActive) values ('".$name."','".$email."','".$contact."','".$dob."','".$address."',".$adminId.",1)";
mysql_query($insertQuery);
$insertId = mysql_insert_id();
if($insertId  > 0)
	$insertStatus = true;
else
	$insertStatus = false;
echo json_encode($insertStatus);

?>