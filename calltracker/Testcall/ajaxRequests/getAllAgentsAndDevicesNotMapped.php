<?php
include("../db_connection.php");
session_start();
$uId = $_SESSION['userId'];
$resultArray = array();
$selectQuery = "select * from (select * from agents where adminId = ".$uId." and isActive = 1) as tbl where id not in (select agentId from agentdevicemapping)";
$selectResult = mysql_query( $selectQuery );

$agentArray = array();
while( $selectRow = mysql_fetch_array( $selectResult ) )
{
	$singleAgent = array();
	$singleAgent['id'] = $selectRow['id'];
	$singleAgent['name'] = $selectRow['name'];
	$singleAgent['dob'] = $selectRow['dob'];
	$singleAgent['contact'] = $selectRow['contact'];
	$singleAgent['address'] = $selectRow['address'];
	
	array_push($agentArray,$singleAgent);
}
$resultArray['agentList'] = $agentArray;


$selectQuery = "select * from (select * from device where adminId = ".$uId.") as tbl where id not in (select deviceId from agentdevicemapping)";
$selectResult = mysql_query( $selectQuery );

$deviceArray = array();
while( $selectRow = mysql_fetch_array( $selectResult ) )
{
	$singledevice = array();
	$singledevice['id'] = $selectRow['id'];
	$singledevice['uid'] = $selectRow['uid'];
	$singledevice['deviceName'] = $selectRow['deviceName'];
	
	array_push($deviceArray,$singledevice);
}
$resultArray['deviceList'] = $deviceArray;

echo json_encode($resultArray);

?>