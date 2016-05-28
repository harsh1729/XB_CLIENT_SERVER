<?php
//configApp.php?username=jaspal.singh&password=password&deviceId=123456789&brandName=samsung&modelName=galaxy
include('../db_connection.php');
$deviceId = $_REQUEST['deviceId'];
$username = $_REQUEST['username'];
$password = md5($_REQUEST['password']);

$configArray = array();

$checkCredentialsQuery = "SELECT * FROM admin where username = '".$username."' and password = '".$password."' limit 1";
$checkCredentialsResult = mysqli_query($db,$checkCredentialsQuery);
$rowCount = mysqli_num_rows($checkCredentialsResult);
if($rowCount === 1)
{
	/// Login succesful, Check isDeviceRegistered
	$userRow = mysqli_fetch_assoc($checkCredentialsResult);
	$userId = $userRow['id'];
	
	$isDeviceRegisteredQuery = "SELECT * FROM device where uid = '".$deviceId."' limit 1";
	$isDeviceRegisteredResult = mysqli_query($db,$isDeviceRegisteredQuery);
	$isDeviceResiteredRowCount = mysqli_num_rows($isDeviceRegisteredResult);
	if($isDeviceResiteredRowCount === 1)
	{
		$registerStatus = true;
		// device already registered,check if registered with another Admin
		$isDeviceRegisteredUserRow = mysqli_fetch_assoc($isDeviceRegisteredResult);
		$adminId = $isDeviceRegisteredUserRow['adminId'];
		if($adminId !== $userId)
		{
			// override adminId if both ids unmatched...
			$updateAdminIdQuery = "update device set adminId = ".$userId." where uid = '".$deviceId."'";
			mysqli_query($db,$updateAdminIdQuery);
		}
	}
	else
	{
		//Device not registered on the server, so first register device.
		$deviceName = addslashes($_REQUEST['deviceName']);
		$registerDeviceQuery = "insert into device (uid,deviceName,adminId) values ('".$deviceId."','".$deviceName."',".$userId.")";
		$registerDeviceResult = mysqli_query($db,$registerDeviceQuery);
		if($registerDeviceResult > 0)
		{
			// Device registered successfully
			$registerStatus = true;
		}
		else
		{
			$registerStatus = false;
		}
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
	$loginStatus = true;
	$configArray['registerStatus'] = $registerStatus;
	$configArray['loginStatus'] = $loginStatus;
	$configArray['mappedStatus'] = $mappedStatus;
}
else
{
	/// Login Failed
	$loginStatus = false;
	$configArray['loginStatus'] = $loginStatus;
}
echo json_encode($configArray);
?>