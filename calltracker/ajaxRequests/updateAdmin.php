<?php
include('../db_connection.php');


$name 	  =	addslashes($_REQUEST['name']);
$email 	  =	addslashes($_REQUEST['email']);
$contact  =	addslashes($_REQUEST['contact']);
//$dobString= addslashes($_REQUEST['dob']);
$address  =	addslashes($_REQUEST['address']);
$adminId = addslashes($_REQUEST['adminId']);

//$dob = date('Y-m-d',strtotime($dobString));

$updateQuery = "update admin set name='".$name."',email='".$email."',contact='".$contact."',address='".$address."' WHERE id = ".$adminId;
$updateStatus = mysqli_query($db,$updateQuery);

echo json_encode($updateStatus);
?>