<?php
include('../db_connection.php');


$name 	  =	addslashes($_REQUEST['name']);
$email 	  =	addslashes($_REQUEST['email']);
$contact  =	addslashes($_REQUEST['contact']);
//$dobString= addslashes($_REQUEST['dob']);
$address  =	addslashes($_REQUEST['address']);
$agentId = addslashes($_REQUEST['agentId']);

//$dob = date('Y-m-d',strtotime($dobString));

$updateQuery = "update agents set name='".$name."',email='".$email."',contact='".$contact."',address='".$address."' WHERE id = ".$agentId;
$updateStatus = mysqli_query($db,$updateQuery);

echo json_encode($updateStatus);
?>