<?php
/**
* This Call inserts locations of any mapped device into database.
*/
include('../db_connection.php');

/**
* 
* 
* 
*/


$location = json_decode($_REQUEST['locationArray']);
$deviceId = $_REQUEST['deviceId'];
//[rowId,lattitude,longitude,daytime]
/*$location = json_decode('[
	[3,"73.258695","29.6263458","2015-01-09 18:19:48"],
	[4,"72.548695","28.5459658","2015-01-08 01:39:48"],
	[5,"72.868695","27.3589658","2015-01-07 10:59:48"],
	[6,"73.234595","28.3455658","2015-01-06 13:50:48"],
	[7,"72.656695","27.8789658","2015-01-05 11:10:48"]
]');*/


$resultArray = array();

$isDeviceRegisteredQuery = "SELECT * FROM device where uid = '".$deviceId."' limit 1";
$isDeviceRegisteredResult = mysql_query($isDeviceRegisteredQuery);
$isDeviceResiteredRowCount = mysql_num_rows($isDeviceRegisteredResult);
if($isDeviceResiteredRowCount === 1)
{
	$deviceRegistered = true;
	
	// Check if Device is mapped with Agent
	$isDeviceMappedQuery = "SELECT * FROM agentdevicemapping WHERE deviceId = (select id from device where uid = '".$deviceId."') limit 1";
	$isDeviceMappedResult = mysql_query($isDeviceMappedQuery);
	$isDeviceMappedRowCount = mysql_num_rows($isDeviceMappedResult);
	$insertDetails = array();
	if($isDeviceMappedRowCount === 1)
	{
		$mappedStatus = true;
		$deviceMappedRow = mysql_fetch_assoc($isDeviceMappedResult);
		$agentId = $deviceMappedRow['agentId'];
		foreach($location as $singleLocationRecord)
		{
			$rowId = $singleLocationRecord[0];
			$lattitude = $singleLocationRecord[1];
			$longitude = $singleLocationRecord[2];
			$daytime = $singleLocationRecord[3];
			
			$insertLocationQuery = "INSERT INTO location (lattitude,longitude,agentId,daytime) values ('".$lattitude."','".$longitude."',".$agentId.",'".$daytime."')";
			mysql_query($insertLocationQuery);
			$locationId = mysql_insert_id();
			if($locationId > 0)
				array_push($insertDetails,$rowId);
		}
		$resultArray['insertedRows'] = $insertDetails;
	}
	else
	{
		$mappedStatus = false;		
	}
	$resultArray['deviceRegistered'] = $deviceRegistered;
	$resultArray['mappedStatus'] = $mappedStatus;
}
else
{
	$deviceRegistered = false;
	$resultArray['deviceRegistered'] = $deviceRegistered;
}
echo json_encode($resultArray);

?>