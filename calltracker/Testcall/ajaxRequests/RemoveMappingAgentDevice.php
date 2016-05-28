<?php
include("../db_connection.php");

$agentId = $_REQUEST['agentid'];
$deviceId = $_REQUEST['deviceid'];

$deleteQuery = "delete from agentdevicemapping where agentId = ".$agentId." and deviceId = ".$deviceId;
$queryStatus = mysql_query($deleteQuery);

echo json_encode($queryStatus);
?>