<?php
include('../db_connection.php');

$agentId = $_REQUEST['agentId'];

$updateQuery = "update agents set isActive = 0 where id = ".$agentId;
$updateStatus = mysql_query($updateQuery);

echo json_encode($updateStatus);
?>