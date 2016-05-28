<?php
include("../db_connection.php");
session_start();
$uId = $_SESSION['userId'];
$selectQuery = "select * from admin where isSuperAdmin <> 1 and clientId = (select clientId from admin where id = ".$uId." ) and isActive = 1";
$selectResult = mysql_query( $selectQuery );

$adminArray = array();
while( $selectRow = mysql_fetch_array( $selectResult ) )
{
	$singleAdmin = array();
	$singleAdmin['id'] = $selectRow['id'];
	$singleAdmin['name'] = $selectRow['name'];
	$singleAdmin['email'] = $selectRow['email'];
	$singleAdmin['contact'] = $selectRow['contact'];
	$singleAdmin['dob'] = date('d-m-Y',strtotime($selectRow['dob']));
	$singleAdmin['address'] = $selectRow['address'];
	
	array_push($adminArray,$singleAdmin);
}

echo json_encode($adminArray);

?>