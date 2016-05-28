<?php
/**
* This Call inserts call log of any mapped device into database.
*/
include('../db_connection.php');

/**
* 
* updatecalllog.php?deviceId=2147483647&callLog=[%20{%20"rowId":3,%20"phone":"7891384482",%20"name":"jaspal",%20"callTypeId":3,%20"daytime":"2015-01-09%2016:29:48",%20"duration":34,%20"location":["74.2586985","29.3526859","2015-01-06%2013:19:02"]%20},%20{%20"rowId":6,%20"phone":"9636121145",%20"name":"unknown",%20"callTypeId":3,%20"daytime":"2015-01-05%2011:29:48",%20"duration":59,%20"location":["47.4578985","89.95876859","2012-01-06%2013:20:28"]%20}%20]
* 
*/

$callLog = json_decode($_REQUEST['callLog']);
$deviceId = $_REQUEST['deviceId'];

/*$callLog = json_decode('[
	{
		"rowId":3,
		"phone":"7891384482",
		"name":"jaspal",
		"callTypeId":3,
		"daytime":"2015-01-09 16:29:48",
		"duration":34,
		"location":["74.2586985","29.3526859"]
	},
	{
		"rowId":6,
		"phone":"9636121145",
		"name":"unknown",
		"callTypeId":3,
		"daytime":"2015-01-05 11:29:48",
		"duration":59,
		"location":["47.4578985","89.95876859"]
	}
]');*/


$resultArray = array();
$callArray = array();
$isDeviceRegisteredQuery = "SELECT * FROM device where uid = '".$deviceId."' limit 1";
$isDeviceRegisteredResult = mysqli_query($db,$isDeviceRegisteredQuery);
$isDeviceResiteredRowCount = mysqli_num_rows($isDeviceRegisteredResult);
if($isDeviceResiteredRowCount === 1)
{
	$deviceRegistered = true;
	
	// Check if Device is mapped with Agent
	$isDeviceMappedQuery = "SELECT * FROM agentdevicemapping WHERE deviceId = (select id from device where uid = '".$deviceId."') limit 1";
	$isDeviceMappedResult = mysqli_query($db,$isDeviceMappedQuery);
	$isDeviceMappedRowCount = mysqli_num_rows($isDeviceMappedResult);
	if($isDeviceMappedRowCount === 1)
	{
		$mappedStatus = true;
		$deviceMappedRow = mysqli_fetch_assoc($isDeviceMappedResult);
		$agentId = $deviceMappedRow['agentId'];
		$insertDetails = array();
		foreach($callLog as $singleCallLogKey)
		{
			$rowId = $singleCallLogKey->rowId;
			$phone = $singleCallLogKey->phone;
			$name = addslashes($singleCallLogKey->name);
			$callTypeId = $singleCallLogKey->callTypeId;
			$daytime = $singleCallLogKey->daytime;
			$duration = $singleCallLogKey->duration;
        	$Audioname = $singleCallLogKey->Audio;
			//$Audioname = str_last_replace("_",".",$Audioname);
			if($singleCallLogKey->location[0] == "" && $singleCallLogKey->location[1] == "" && $singleCallLogKey->location === 0 )
			{
				$locationId = 0;
			}
			else
			{
				$lattitude = $singleCallLogKey->location[0];
				$longitude = $singleCallLogKey->location[1];
				$locationInsertQuery = "INSERT INTO location (lattitude,longitude,agentId,daytime) values ('".$lattitude."','".$longitude."',".$agentId.",'".$daytime."')";
				mysqli_query($db,$locationInsertQuery);
				$locationId = mysqli_insert_id($db);
			}
            //SELECT id FROM recordno WHERE number in ('8875897798') AND agentId in ('5')
			$selectquery = "SELECT id FROM recordno WHERE number in ('".$phone."') AND agentId in (".$agentId.")";
			$count = mysqli_query($db,$selectquery);
           if(mysqli_num_rows($count)===0){
			$callnoInsert = "INSERT INTO recordno (number,name,agentId) values ('".$phone."','".$name."',".$agentId.")";
			 mysqli_query($db,$callnoInsert);
		     }
			$callLogInsertQuery = "INSERT INTO calllog (agentId,phone,name,callTypeId,daytime,duration,locationId,songrecord) values (".$agentId.",'".$phone."','".$name."',".$callTypeId.",'".$daytime."',".$duration.",".$locationId.",'".$Audioname."')";
			mysqli_query($db,$callLogInsertQuery);
			$callLogId = mysqli_insert_id($db);
			if($callLogId > 0)
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
$selectquery = "SELECT * FROM recordno WHERE agentId = ".$agentId." AND isrecord = '1'";
$selectResult = mysqli_query($db,$selectquery);
while( $selectRow = mysqli_fetch_array( $selectResult ))
{
    $singleAgent = array();
	//$singleAgent['id'] = $selectRow['id'];
	//$singleAgent['name'] = $selectRow['name'];
    $singleAgent['phone'] = $selectRow['number'];
    //$singleAgent['isrecord'] = $selectRow['isrecord'];
	array_push($callArray,$singleAgent);
	}
   
    $allRecord = "false";
$selectqueryAllrecord = "SELECT * FROM agents WHERE id = ".$agentId."";
$selectResultAllrecord = mysqli_query($db,$selectqueryAllrecord);
while( $selectRow = mysqli_fetch_array( $selectResultAllrecord ))
{
   $recorditem = $selectRow['recordAll'];
   if($recorditem == 1 ){
      $allRecord = "true"; 
   }
  	}
}
else
{
	$deviceRegistered = false;
	$resultArray['deviceRegistered'] = $deviceRegistered;
}

echo json_encode(array("callLogs"=>$resultArray,"recordNo"=>$callArray,"allRecord"=>$allRecord));
?>