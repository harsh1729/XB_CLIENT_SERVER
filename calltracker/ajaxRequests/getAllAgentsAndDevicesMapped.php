<?php
include("../db_connection.php");
session_start();
$uId = $_SESSION['userId'];
//$selectQuery = "select agentTbl.id agentId,name,dob,contact,address,agentTbl.adminId,isActive,status,device.id deviceId,uid,brand,model from (select * from (select * from agents where adminId = ".$uId." and isActive = 1) as tbl where id in (select agentId from agentdevicemapping) ) as agentTbl inner join device on agentTbl.id = device.id";
$selectQuery = "Select M.agentId,M.deviceId,A.name , A.contact , D.uid , D.deviceName FROM agentdevicemapping M INNER JOIN agents A ON A.id = M.agentId INNER JOIN device D ON D.id = M.deviceId WHERE A.adminId = ".$uId." AND A.isActive = 1";
$selectResult = mysqli_query($db, $selectQuery );

$agentArray = array();
while( $selectRow = mysqli_fetch_array( $selectResult ) )
{
	$singleAgent = array();
	$singleAgent['agentId'] = $selectRow['agentId'];
	$singleAgent['deviceId'] = $selectRow['deviceId'];
	$singleAgent['name'] = $selectRow['name'];
	$singleAgent['contact'] = $selectRow['contact'];
	$singleAgent['uid'] = $selectRow['uid'];
	$singleAgent['deviceName'] = $selectRow['deviceName'];
	
	array_push($agentArray,$singleAgent);
}

echo json_encode($agentArray);

?>