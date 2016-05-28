<?php
include('../db_connection.php');

$agentId = $_REQUEST['agentId'];

$updateQuery = "update agents set isActive = 0 where id = ".$agentId;
$updateStatus = mysqli_query($db,$updateQuery);

echo json_encode($updateStatus);
?>