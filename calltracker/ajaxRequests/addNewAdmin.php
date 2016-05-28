<?php
include('../db_connection.php');
session_start();

$name 	  =	addslashes($_REQUEST['name']);
$email 	  =	addslashes($_REQUEST['email']);
$contact  =	addslashes($_REQUEST['contact']);
$dobString= addslashes($_REQUEST['dob']);
$address  =	addslashes($_REQUEST['address']);
$username = addslashes($_REQUEST['username']);
$password = md5(addslashes($_REQUEST['password']));

$adminId = 	$_SESSION['userId'];

$clientIdQuery = "select clientId from admin where id = ".$adminId;
$clientIdResult = mysqli_query($db,$clientIdQuery);
$clientIdRow = mysqli_fetch_assoc($clientIdResult); 
$clientId = $clientIdRow['clientId'];

$dob = date('Y-m-d',strtotime($dobString));

$insertQuery = "insert into admin (name,email,contact,dob,address,username,password,isSuperAdmin,clientId,isActive) values ('".$name."','".$email."','".$contact."','".$dob."','".$address."','".$username."','".$password."',0,".$clientId.",1)";
mysqli_query($db,$insertQuery);
$insertId = mysqli_insert_id($db);
if($insertId  > 0)
	$insertStatus = true;
else
	$insertStatus = false;
echo json_encode($insertStatus);

?>