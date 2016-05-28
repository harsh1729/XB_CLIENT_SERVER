<?php
include("../db_connection.php");

$agentId = $_REQUEST['agentid'];
$deviceId = $_REQUEST['deviceid'];

$deleteQuery = "delete from agentdevicemapping where agentId = ".$agentId." and deviceId = ".$deviceId;
$queryStatus = mysqli_query($db,$deleteQuery);

echo json_encode($queryStatus);
?>