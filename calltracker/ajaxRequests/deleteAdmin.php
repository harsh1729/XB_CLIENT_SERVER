<?php
include('../db_connection.php');

$adminId = $_REQUEST['adminId'];

$updateQuery = "update admin set isActive = 0 where id = ".$adminId;
$updateStatus = mysqli_query($db,$updateQuery);

echo json_encode($updateStatus);
?>