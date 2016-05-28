<?php
include("../db_connection.php");
session_start();
$agentId =  $_REQUEST['agentid'];
$deviceId = $_REQUEST['deviceid'];
$adminId = $_SESSION['userId'];

$dtObj = new DateTime("now");
$dtObj->setTimeZone(new DateTimeZone("Asia/Kolkata"));
$daytime = $dtObj->format("Y-m-d H:i:s");

$MAX_USER_LIMIT = 15;

$maxcountQuery = "select count(*) as totalagents from agents inner join agentdevicemapping on agentdevicemapping.agentId = agents.id where adminid in (select id from admin where clientid = (select clientid from admin where id = ".$adminId.")) AND agents.isActive=1";
$maxcountResult = mysqli_query($db,$maxcountQuery);
$totalagents = (int)mysqli_fetch_assoc($maxcountResult);

if($totalagents >= $MAX_USER_LIMIT)
{
    echo json_encode(array('status'=>false,'msg'=>'You reached maximum limit of users !','limit'=>$totalagents));
}
else
{
	$insertQuery = "insert into agentdevicemapping (agentId,deviceId,mappedBy,daytime) values (".$agentId.",".$deviceId.",".$adminId.",'".$daytime."')";
	mysqli_query($db,$insertQuery);
	$insertId = mysqli_insert_id($db);

	if($insertId > 0)
		$mappedStatus = true;
	else
		$mappedStatus = false;
		
	echo json_encode(array('status'=>true,'mapped'=>$mappedStatus));
}

?>