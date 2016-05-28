<?php
include("../db_connection.php");
session_start();
$uId = $_SESSION['userId'];
$selectQuery = "select * from agents where adminId = ".$uId." and isActive = 1";
$selectResult = mysqli_query($db, $selectQuery );

$agentArray = array();
while( $selectRow = mysqli_fetch_array( $selectResult ) )
{
	$singleAgent = array();
	$singleAgent['id'] = $selectRow['id'];
	$singleAgent['name'] = $selectRow['name'];
	$singleAgent['dob'] = $selectRow['dob'];
	$singleAgent['contact'] = $selectRow['contact'];
	$singleAgent['address'] = $selectRow['address'];
	$singleAgent['email'] = $selectRow['email'];
	
	array_push($agentArray,$singleAgent);
}

echo json_encode($agentArray);

?>