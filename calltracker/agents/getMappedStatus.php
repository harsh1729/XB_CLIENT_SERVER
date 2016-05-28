<?php
include("../db_connection.php");
$deviceId = $_REQUEST['deviceId'];

$configArray = array();

	$isDeviceRegisteredQuery = "SELECT * FROM device where uid = '".$deviceId."' limit 1";
	$isDeviceRegisteredResult = mysqli_query($db,$isDeviceRegisteredQuery);
	$isDeviceResiteredRowCount = mysqli_num_rows($isDeviceRegisteredResult);
	if($isDeviceResiteredRowCount === 1)
	{
		$registerStatus = true;
	}
	else
	{
		$registerStatus = false;
	}
	// Check if Device is mapped with Agent
	$isDeviceMappedQuery = "SELECT * FROM agentdevicemapping WHERE deviceId = (select id from device where uid = '".$deviceId."') limit 1";
	$isDeviceMappedResult = mysqli_query($db,$isDeviceMappedQuery);
	$isDeviceMappedRowCount = mysqli_num_rows($isDeviceMappedResult);
	if($isDeviceMappedRowCount === 1)
	{
		// Device is mapped with Agent.
		$mappedStatus = true;
	}
	else
	{
		// Device is not mapped with any Agent.
		$mappedStatus = false;
	}
	$configArray['registerStatus'] = $registerStatus;
	$configArray['mappedStatus'] = $mappedStatus;

echo json_encode($configArray);
?>